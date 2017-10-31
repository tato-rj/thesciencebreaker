@component('mail::message')
<p>Ciao Max, you have a new <strong>general message</strong> from the contact page. See all the details below.</p>

@include('emails/snippets/response')

@component('mail::button', ['url' => $request['email']])
Click here to reply
@slot('color')
breaker
@endslot
@endcomponent
@endcomponent