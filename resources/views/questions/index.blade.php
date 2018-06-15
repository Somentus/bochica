@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($questions as $question)
        @include('questions.simple')
    @endforeach
</div>
@endsection
