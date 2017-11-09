@component('mail::message')
<p>Ciao Max, you have a new <strong>Break submission</strong>. See all the details below.</p>

@include('emails/snippets/response')

@component('mail::button', ['url' => asset($file)])
Click here to download the Break
@slot('color')
breaker
@endslot
@endcomponent

@endcomponent
