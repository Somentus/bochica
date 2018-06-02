@extends('layouts.app')

@section('content')
	@foreach($questions as $question)
		<a href="/questions/{{ $question->id }}"><h5>{{ $question->title }}</h5></a>
		{{ $question->body }}
		<br><br>
	@endforeach
@endsection