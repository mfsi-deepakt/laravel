@component('mail::message')
<h2>Hi {{$feedback->user->name}}, Your feedback posted successfully.</h2>


@component('mail::button', ['url' => route('homeDemo')])
Login to Blog
@endcomponent

Thanks,<br>
-Deepak
@endcomponent
