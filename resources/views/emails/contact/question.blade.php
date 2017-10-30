@component('mail::message')
<p>Ciao Max, you have a new <strong>general message</strong> from the contact page. See all the details below.</p>

<p class="contact-field"><strong class="d-block">Name</strong>{{ $request['full_name'] }}</p>
<p class="contact-field"><strong class="d-block">Email</strong> {{ $request['email'] }}</p>
<p class="contact-field"><strong class="d-block">Message</strong>{{ $request['message'] }}</p>

@component('mail::button', ['url' => $request['email']])
Click here to reply
@slot('color')
breaker
@endslot
@endcomponent
@endcomponent