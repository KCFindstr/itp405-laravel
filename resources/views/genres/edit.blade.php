@extends('layout')

@section('title', 'Edit Genre')

@section('main')
<div class="row m-2">
	<div class="col">
		<form action="/genres" method="post">
			@csrf
			<input type="number" name="id" value="{{$info->GenreId}}" hidden/>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" id="name" name="name" class="form-control" value="{{old('name') ? old('name') : $info->Name }}">
					<small class="text-danger">{{$errors->first('name')}}</small>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">
				Save
			</button>
		</form>
	</div>
</div>
@endsection