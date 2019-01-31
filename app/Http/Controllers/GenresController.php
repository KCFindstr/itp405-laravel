<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller {
	public function index() {
		$genres = DB::table('genres')->get();
		return view('genres', [
			'genres' => $genres
		]);
	}

	public function edit($id) {
		$info = DB::table('genres')
			->where('GenreId', '=', $id)
			->first();
		return view('genres.edit', [
			'info' => $info
		]);
	}

	public function store(Request $request) {
		$input = $request->all();

    $validation = Validator::make($input, [
			'name' => 'required|min:3|unique:genres,Name',
			'id' => 'required'
    ]);

    if ($validation->fails()) {
			return redirect('/genres/' . $request->id . '/edit')
				->withInput()
				->withErrors($validation);
    }
		
		DB::table('genres')
			->where('GenreId', '=', $request->id)
			->update([
				'Name' => $request->name
			]);
		
    return redirect('/genres');
  }
}
