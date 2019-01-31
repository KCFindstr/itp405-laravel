@extends('layout')

@section('title', 'Add Track')

@section('main')
<div class="row m-2">
	<div class="col">
		<form action="/tracks" method="post">
			@csrf
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
					<small class="text-danger">{{$errors->first('name')}}</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="album" class="col-sm-2 col-form-label">Album</label>
				<div class="col-sm-10">
					<select class="form-control" id="album" name="album">
						<option value="">Choose an album...</option>
						@foreach ($albums as $album)
						<option value="{{$album->AlbumId}}" {{$album->AlbumId == old('album') ? 'selected' : ''}}>{{$album->Title}}</option>
						@endforeach
					</select>
					<small class="text-danger">{{$errors->first('album')}}</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="media_type" class="col-sm-2 col-form-label">Media Type</label>
				<div class="col-sm-10">
					<select class="form-control" id="media_type" name="media_type">
						<option value="">Choose a media type...</option>
						@foreach ($medias as $media)
						<option value="{{$media->MediaTypeId}}" {{$media->MediaTypeId == old('media_type') ? 'selected' : ''}}>{{$media->Name}}</option>
						@endforeach
					</select>
					<small class="text-danger">{{$errors->first('media_type')}}</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="genre" class="col-sm-2 col-form-label">Genre</label>
				<div class="col-sm-10">
					<select class="form-control" id="genre" name="genre">
						<option value="">Choose a genre...</option>
						@foreach ($genres as $genre)
						<option value="{{$genre->GenreId}}" {{$genre->GenreId == old('genre') ? 'selected' : ''}}>{{$genre->Name}}</option>
						@endforeach
					</select>
					<small class="text-danger">{{$errors->first('genre')}}</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="composer" class="col-sm-2 col-form-label">Composer</label>
				<div class="col-sm-10">
					<input type="text" id="composer" name="composer" class="form-control" value="{{old('composer')}}">
					<small class="text-danger">{{$errors->first('composer')}}</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="milliseconds" class="col-sm-2 col-form-label">Milliseconds</label>
				<div class="col-sm-10">
					<input type="number" step="any" id="milliseconds" name="milliseconds" class="form-control" value="{{old('milliseconds')}}">
					<small class="text-danger">{{$errors->first('milliseconds')}}</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="bytes" class="col-sm-2 col-form-label">Bytes</label>
				<div class="col-sm-10">
					<input type="number" step="any" id="bytes" name="bytes" class="form-control" value="{{old('bytes')}}">
					<small class="text-danger">{{$errors->first('bytes')}}</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="unit_price" class="col-sm-2 col-form-label">Unit Price</label>
				<div class="col-sm-10">
					<input type="number" step="any" id="unit_price" name="unit_price" class="form-control" value="{{old('unit_price')}}">
					<small class="text-danger">{{$errors->first('unit_price')}}</small>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">
				Save
			</button>
		</form>
	</div>
</div>
@endsection