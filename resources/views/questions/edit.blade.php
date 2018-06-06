@extends('layouts.app')

@section('content')
	<form action="/questions/{{ $question->id }}" method="POST" >
		@method('PATCH')
		<div class="form-group">
			<label class="form-check-label" for="title">
				Title
			</label>
			<input class="form-control" type="text" name="title" id="title" value="{{ $question->title }}" >
		</div>

		<div class="form-group">
			<label class="form-check-label" for="body">
				Body
			</label>
			<input class="form-control" type="text" name="body" id="body" value="{{ $question->body }}">
		</div>

    	<br>
		@csrf

		<button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection