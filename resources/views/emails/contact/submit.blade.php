@component('mail::message')
<p>Ciao Max, you have a new <strong>Break submission</strong>. See all the details below.</p>

<p class="contact-field"><strong class="d-block">Name</strong>{{ $request['full_name'] }}</p>
<p class="contact-field"><strong class="d-block">Institution Email</strong> {{ $request['institution_email'] }}</p>
<p class="contact-field"><strong class="d-block">Field Research</strong>{{ $request['field_research'] }}</p>
<p class="contact-field"><strong class="d-block">Institution</strong>{{ $request['institute'] }}</p>
<p class="contact-field"><strong class="d-block">Original Article</strong>{{ $request['original_article'] }}</p>
<p class="contact-field"><strong class="d-block">Position</strong>{{ $request['position'] }}</p>
<p class="contact-field"><strong class="d-block">Message</strong>{{ $request['message'] }}</p>

@component('mail::button', ['url' => $file])
Click here to download the Break
@slot('color')
breaker
@endslot
@endcomponent

@endcomponent
