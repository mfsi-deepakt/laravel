@component('mail::message')
Hi <b>{{$comment->feedback->user->name}}, "{{$comment->user->name}}</b>" <i>Added a comment on your feedback</i> <b>["{{$comment->feedback->title}}"]</b>.

<hr>
<b>Comment : </b> <i>{{$comment->body}}</i>

@component('mail::button', ['url' => route('homeDemo')])
Login Here
@endcomponent

Thanks,<br>
-Deepak
@endcomponent
