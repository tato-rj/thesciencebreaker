@component('mail::message')
# You have a new Contact

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