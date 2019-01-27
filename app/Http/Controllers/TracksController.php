<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
}
