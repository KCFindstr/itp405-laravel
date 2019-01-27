@extends('layout')

@section('title')
Genres
@endsection

@section('main')
<table class="table">
	<tr>
		<th>ID</th>
		<th>Genre</th>
	</tr>
	@foreach ($genres as $genre)
	<tr>
		<td>
			{{ $genre->GenreId }}
		</td>
		<td>
			<a href="tracks?genre={{ urlencode($genre->Name) }}">
				{{ $genre->Name }}
			</a>
		</td>
	</tr>
	@endforeach
</table>
@endsection