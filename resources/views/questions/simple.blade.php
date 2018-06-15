<div class="row pb-3">
    <div class="border p-3 w-100" >
        <div class="row">
            <div class="col-md-9">    
                <a href="/questions/{{ $question->id }}">
                    <h5>{{ $question->title }}</h5>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{ $question->user->name }}, 
                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))->diffForHumans() }}
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