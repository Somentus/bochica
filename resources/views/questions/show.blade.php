@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row pb-3">
            <div class="border border-dark p-3 w-100" >
                <div class="row">
                    <div class="col-md-1">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <a class="text-success" href="/questions/{{ $question->id }}/vote"
                                    onclick="
                                        event.preventDefault();
                                        document.getElementById('question-vote-form-up').submit();
                                    ">
                                    <i class="fas fa-arrow-up"></i>
                                </a>
                                <form id="question-vote-form-up" action="/questions/{{ $question->id }}/vote" method="POST" style="display: none;">
                                    @csrf
                                    <input id="flag" name="flag" type="hidden" value="up" ></input>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $question->upvotes() }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $question->downvotes() }}
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-md-12">
                                <a class="text-danger" href="/questions/{{ $question->id }}/vote"
                                    onclick="
                                        event.preventDefault();
                                        document.getElementById('question-vote-form-down').submit();
                                    ">
                                    <i class="fas fa-arrow-down"></i>
                                </a>
                                <form id="question-vote-form-down" action="/questions/{{ $question->id }}/vote" method="POST" style="display: none;">
                                    @csrf
                                    <input id="flag" name="flag" type="hidden" value="down" ></input>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-12">    
                                <h5><strong>
                                    {{ $question->title }}
                                </h5></strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <small>
                                    {{ $question->user->name }}, 
                                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    {{ $question->body }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($question->answers->count() > 0)
            <hr>
        @endif

        @foreach( $question->answers as $answer)
            <div class="row pb-3">
                <div class="border p-3 w-100">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <a class="text-success" href="/answers/{{ $answer->id }}/vote"
                                        onclick="
                                            event.preventDefault();
                                            document.getElementById('answer-vote-form-up').submit();
                                        ">
                                        <i class="fas fa-arrow-up"></i>
                                    </a>
                                    <form id="answer-vote-form-up" action="/answers/{{ $answer->id }}/vote" method="POST" style="display: none;">
                                        @csrf
                                        <input id="flag" name="flag" type="hidden" value="up" ></input>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $answer->upvotes() }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $answer->downvotes() }}
                                </div>
                            </div>
                            <div class="row">                            
                                <div class="col-md-12">
                                    <a class="text-danger" href="/answers/{{ $answer->id }}/vote"
                                        onclick="
                                            event.preventDefault();
                                            document.getElementById('answer-vote-form-down').submit();
                                        ">
                                        <i class="fas fa-arrow-down"></i>
                                    </a>
                                    <form id="answer-vote-form-down" action="/answers/{{ $answer->id }}/vote" method="POST" style="display: none;">
                                        @csrf
                                        <input id="flag" name="flag" type="hidden" value="down" ></input>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-11">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        {{ $answer->body }}
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">    
                                    <small>
                                        {{ $answer->user->name }}, 
                                        {{ \Carbon\Carbon::createFromTimeStamp(strtotime($answer->created_at))->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
