@extends ('layouts.app')

@section ('content')

@if (count($user))
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-sm-12 profile">
			<span>Name :</span> <strong>{{$user->name}}</strong>
			<br>
			<span>Email :</span> <strong>{{$user->email}}</strong>
        </div>
	</div>
	<hr>
	<div>
		<h1>My Feedbacks</h1>
		<ol>
			@if (!count($user->feedbacks)) 
				<h3>You have not posted any Feedback Yet, Please Post you Feedback <a href="{{route("createFeedback")}}">Here</a></h3>
			@endif
			@foreach ($user->feedbacks as $feedback)
			<li><h3><b>
				<a href="{{route('feedbackShow', [
						'id' => $feedback->id
					])}}">{{$feedback->title}}</a>
				</b></h3>
			</li>
			@endforeach
		</ol>
	</div>
</div>
@endif
@endsection