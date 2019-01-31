<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller {
	public function index(Request $request) {
		$query = DB::table('tracks')
			->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
			->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
			->join('genres', 'genres.GenreId', '=', 'tracks.GenreId');

		if ($request->query('genre')) {
			$query->where('genres.Name', '=', $request->query('genre'));
		}

		$query->select('tracks.Name',
			'albums.Title',
			'artists.Name as Artist',
			'tracks.Unitprice');
		
		$tracks = $query->get();
		return view('tracks', [
			'tracks' => $tracks
		]);
	}

	public function create() {
		$albums = DB::table('albums')->get();
		$medias = DB::table('media_types')->get();
		$genres = DB::table('genres')->get();
		return view('create', [
			'albums' => $albums,
			'medias' => $medias,
			'genres' => $genres
		]);
	}

	public function store(Request $request) {
		$input = $request->all();

    $validation = Validator::make($input, [
			'name' => 'required',
			'album' => 'required',
			'media_type' => 'required',
			'genre' => 'required',
			'composer' => 'required',
			'milliseconds' => 'required|numeric',
			'bytes' => 'required|numeric',
			'unit_price' => 'required|numeric'
    ]);

    if ($validation->fails()) {
			return redirect('/tracks/new')
				->withInput()
				->withErrors($validation);
    }
		
		DB::table('tracks')->insert([
			'Name' => $request->name,
			'AlbumId' => $request->album,
			'MediaTypeId' => $request->media_type,
			'GenreId' => $request->genre,
			'Composer' => $request->composer,
			'Milliseconds' => $request->milliseconds,
			'Bytes' => $request->bytes,
			'UnitPrice' => $request->unit_price
		]);
		
    return redirect('/tracks');
  }
}
