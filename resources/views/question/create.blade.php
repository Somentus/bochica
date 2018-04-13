@extends('layout.master')

@section('content')

	<form method="POST" action="/questions">

		@csrf

		<input type="text" id="title" name="title">

		<input type="text" id="body" name="body">

		<button type="submit">Post Question</button>

	</form>

	<br>

	@if(count($errors))

		<ul>

			@foreach($errors->all() as $error)

				<li>{{ $error }}</li>

			@endforeach

		</ul>

	@endif

@endsection