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