@extends('layouts.app')

@section('content')
	<h5>{{ $question->title }}</h5>
	{{ $question->body }}

	<form action="/questions/{{ $question->id }}" method="POST">
	    @method('DELETE')
	    @csrf
	    <button type="submit" class="btn btn-secondary">Delete question</button>
	</form>
	<a href="/questions/{{ $question->id }}/edit">Edit</a>
@endsection