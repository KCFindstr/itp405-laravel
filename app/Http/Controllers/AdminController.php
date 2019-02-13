<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{
	public function index() {
		return view('admin/profile', [
			'user' => Auth::user()
		]);
	}

	public function settings() {
		$isMaintenance = DB::table('config')
			->where('name', '=', 'maintenance')->first();
		return view('admin.settings', [
			'maintain' => $isMaintenance->value == 'on'
		]);
	}

	public function update(Request $request) {
		DB::table('config')
			->where('name', '=', 'maintenance')
			->update([
				'value' => $request->maintain ? 'on' : 'off'
			]);
		return redirect('/settings');
	}

	public function maintain() {
		return view('admin.maintain');
	}
}
