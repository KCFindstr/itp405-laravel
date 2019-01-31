@extends('layout')

@section('title', 'Tracks')

@section('main')
<a href="/tracks/new" class="btn btn-primary my-2">Add Track</a>
<table class="table">
	<tr>
		<th>Track Name</th>
		<th>Album Title</th>
		<th>Artist Name</th>
		<th>Price</th>
	</tr>
	@forelse ($tracks as $track)
	<tr>
		<td>
			{{ $track->Name }}
		</td>
		<td>
			{{ $track->Title }}
		</td>
		<td>
			{{ $track->Artist }}
		</td>
		<td>
			{{ $track->UnitPrice }}
		</td>
	</tr>
	@empty
	<tr>
		<td colspan="4">
			No tracks found.
		</td>
	</tr>
	@endforelse
</table>
@endsection
