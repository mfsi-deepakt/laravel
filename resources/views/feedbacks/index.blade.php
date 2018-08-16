@extends ('layouts.app')

@section ('content')

<div class="clear-fix create-feedback">
	<div style="float:right">
		<a class="btn btn-success" href = "feedback/create">Create Feedback</a>
	</div>
</div>

@if (count($feedbacks))
	@php $count = 1 @endphp
	<br>
	<h1><i>Submitted Feedbacks</i></h1>
	@foreach ($feedbacks as $feedback)
		@if ($count%2)
			<div class="row" style="margin : 2% 0% 0% 10%">
		@endif
			<div class="col-md-5" style="border : 1px solid #ddd; box-shadow: 0px 0px 5px 5px red; text-align: center; margin: 1%">
				<h2><a href="feedback/{{$feedback->id}}" >{{$count.'. '.$feedback->title}}</a></h2>
				<i>By : {{$feedback->user->name}}</i>
				<hr>
				<div style="text-align: left">
					<p><i>{{$feedback->body}}</i></p>
				</div>
			</div>
		@if ($count%2 == 0) 
			</div>
		@endif	
	@php $count++; @endphp
	@endforeach
@endif 

@if (!count($feedbacks))
	<div class="container">
		<div class="row">
			<b><h1>We dont have any feedbacks. Please enter a new Feedback</h1></b>
		</div>
	</div>
@endif
@endsection