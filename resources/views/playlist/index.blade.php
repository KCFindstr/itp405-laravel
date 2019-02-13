@extends('layout')

@section('title', 'Playlists')

@section('main')
<div class="row">
	<div class="col-3">
		<a href="/playlists/new">Add a Playlist</a>
		<ul>
			@forelse ($playlists as $playlist)
				<li>
					<a href="/playlists/{{$playlist->PlaylistId}}">
						{{$playlist->Name}}
					</a>
				</li>
			@empty
				<li>No playlists</li>
			@endforelse
		</ul>
	</div>
	<div class="col-9">
		<ul>
			@forelse ($tracks as $track)	
			<li>
				{{$track->Name}}
			</li>
			@empty
			<li>
				No tracks found for the playlist.
			</li>
			@endforelse
		</ul>
	</div>
</div>
@endsection