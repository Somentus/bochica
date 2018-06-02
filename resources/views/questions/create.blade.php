@extends('layouts.app')

@section('content')
	<form action="/questions" method="POST" >
		<div class="form-group">
			<label class="form-check-label" for="title">
				Title
			</label>
			<input class="form-control" type="text" name="title" id="title" value="" >
		</div>

		<div class="form-group">
			<label class="form-check-label" for="body">
				Body
			</label>
			<input class="form-control" type="text" name="body" id="body" value="" >
		</div>

    	<br>
		@csrf

		<button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection