@extends ('layouts.app')

@section ('content')
<div class="form-group">
	<h1>Hello,Please Submit Your Feedback</h1>
	@php
		echo Form::model($feedback, ['url' => 'feedback']);
	@endphp
	<br><br>
	<div class="form-group feedback-group">
        <label for="" class="control-label col-sm-3">Title</label>
        <div class="col-sm-6" style="margin-right : 25%; float: right;">
		<input type="text" id="feedback-titile" class="form-control" name="title" maxlength="50" aria-required="true" value="{{old('title')}}">
			<div class="help-block help-block-error " style = "color:red">{{$errors->first('title')}}</div>
		</div>
    </div>

    <div class="form-group feedback-group">
        <label for="" class="control-label col-sm-3">Summary</label>
        <div class="col-sm-6" style="margin-right : 25%; float: right;">
		<textarea id="feedback-titile" class="form-control" name="body" maxlength="500" aria-required="true" >{{ old('body') }} </textarea>
			<div class="help-block help-block-error " style = "color:red">{{$errors->first('body')}}</div>
		</div>
    </div>
    <br><br>
    <div class="form-group feedback-group">
    	<button type="submit" class="btn btn-success">Create</button>
    </div>
</div>
@endsection