@component('mail::message')
<p>Ciao Max, you have a new <strong>Break inquiry</strong>. See all the details below.</p>

<p class="contact-field"><strong class="d-block">Name</strong>{{ $request['full_name'] }}</p>
<p class="contact-field"><strong class="d-block">Email</strong> {{ $request['email'] }}</p>
<p class="contact-field"><strong class="d-block">I heard about this news on</strong>{{ $request['news_from'] }}</p>
<p class="contact-field"><strong class="d-block">Article Title</strong>{{ $request['article_title'] }}</p>
<p class="contact-field"><strong class="d-block">Author Name</strong>{{ $request['author_name'] }}</p>
<p class="contact-field"><strong class="d-block">URL</strong>{{ $request['article_url'] }}</p>
<p class="contact-field"><strong class="d-block">Message</strong>{{ $request['message'] }}</p>

@component('mail::button', ['url' => $request['email']])
Click here to reply
@slot('color')
breaker
@endslot
@endcomponent
@endcomponent
