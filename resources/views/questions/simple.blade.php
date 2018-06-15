<div class="row pb-3">
    <div class="border p-3 w-100" >
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
                            <a href="/questions/{{$question->id}}">
                                {{ $question->title }}
                            </a>
                        </h5></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <small>
                            {{ $question->user->name }}, 
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))->diffForHumans() }}
                        </small>
                    </div>
                    <div class="col-md-6">
                        <div class="float-right">   
                            @foreach($question->tags as $tag)  
                                {{ $tag->name }}   
                            @endforeach    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>