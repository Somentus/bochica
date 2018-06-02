@extends('layouts.app')

@section('content')
	<h5>{{ $question->title }}</h5>
	{{ $question->body }}
@endsection