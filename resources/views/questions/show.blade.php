@extends('layouts.app')

@section('content')
	<div class="container">
        @include('questions.question')

        @if($question->answers->count() > 0)
            <hr>
        @endif

        @foreach( $question->answers as $answer)
            @include('questions.answer')
        @endforeach
    </div>

@endsection
