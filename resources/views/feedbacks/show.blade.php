@extends ('layouts.app')

@section ('content')

<div class="panel" style =" margin: 2%; padding-top: 1%;">
	<h1>{{$feedback->title}}</h1>
	 <a href="{{ route('download',['id'=> $feedback->id]) }}" class="pull-right">Download PDF <i class="fa fa-print" aria-hidden="true"></i></a>
	<div class="col-md-9 show-feedback">
		<label>{{$feedback->body}}</label>
		<label>{{$feedback->created_at}}</label>
	</div>
	<div class="comments">
		<ul  class="list-group">
			@foreach ($feedback->comments as $comment)
				<li class="list-group-item"> <strong><a href="{{route('user-profile', ['id' => $comment->user->id])}}">{{$comment->user->name}}</a> added a comment : <i>{{ $comment->created_at->diffForHumans()}} </i></strong>
					<br>{{$comment->body}}
				</li>
			@endforeach
		</ul>
	<div>
	<div class ="card-block">
		<form method="POST" action="{{route('addcomment', ['feedback' => $feedback])}}">

			{{ csrf_field()}}
			<div class="form-group">
				<textarea name="body" placeholder="Add your comments..." class="form-control">{{old('body')}}</textarea>
				<div class="help-block help-block-error " style = "color:red">{{$errors->first('body')}}</div>
			</div>
			<div class="form-group">
		    	<button type="submit" class="btn btn-success">Create</button>
		    </div>
		</form>
	</div>
	</div>
</div>
@endsection