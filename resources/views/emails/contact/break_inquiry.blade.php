@component('mail::message')
<p>Ciao Max, you have a new <strong>Break inquiry</strong>. See all the details below.</p>

@include('emails/snippets/response')

@component('mail::button', ['url' => $request['email']])
Click here to reply
@slot('color')
breaker
@endslot
@endcomponent
@endcomponent
