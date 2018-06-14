@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row pb-3">
            <div class="border p-3 w-100" >
                <div class="row">
                    <div class="col-md-9">    
                        <h5><strong>
                            {{ $question->title }}
                        </h5></strong>
                    </div>
                    <div class="col-md-3">
                        <div class="float-right">
                            X Points
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
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
@endsection
