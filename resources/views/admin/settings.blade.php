@extends('layout')

@section('name', 'Settings')
		
@section('main')
	<form action="/settings" method="post">
		@csrf
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="maintain" name="maintain" {{$maintain ? 'checked': ''}}/>
			<label class="form-check-label" for="maintain">Maintenance Mode</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection