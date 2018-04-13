@extends('layout.master')

@section('content')

	<ul>

	@foreach($questions as $question)

		<li>{{ $question }}</li>

	@endforeach

	</ul>

@endsection