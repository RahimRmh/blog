
<div>
      <h2>comments</h2>
    @if(count($comments)==0)
    <h4>No comments</h4>
    @endif
    <h2> @foreach($comments as $comment) </h2>
    <h2> {{ $comment->name}}</h2>
     <p>{{ $comment->body }}</p>
      @endforeach
      </div>
    