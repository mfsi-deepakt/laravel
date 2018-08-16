@component('mail::message')

# Introduction

The body of your message.

1. Name
2. Name
3. Name
{{$user->feedbacks()->first()->body}}
@component('mail::button', ['url' => '/fb.com'])
Login Here
@endcomponent

@component('mail::panel', ['url' => 'fb.com'])
Demo text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
