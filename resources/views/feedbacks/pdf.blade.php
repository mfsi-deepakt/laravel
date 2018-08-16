<div class="panel" style =" margin: 2%; padding-top: 1%;">
	<h1>Blog PDF : {{$feedback->title}}</h1>
	<div class="col-md-9 show-feedback">
		<label>{{$feedback->body}}</label>
		<label>{{$feedback->created_at}}</label>
	</div>
	<div class="comments">
		<ul  class="list-group">
			@foreach ($feedback->comments as $comment)
				<li class="list-group-item"> 
					<strong><a href="{{route('user-profile', ['id' => $comment->user->id])}}">{{$comment->user->name}}</a> added a comment : <i>{{ $comment->created_at->diffForHumans()}} </i></strong>
					<br>
					{{$comment->body}}
				</li>
			@endforeach
		</ul>
	</div>
</div>