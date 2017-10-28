@component('mail::message')
# Welcome to TheScienceBreaker!

Hello {{ $breaker->first_name }}, thank you for signing up.

@component('mail::button', ['url' => 'thesciencebreaker.app'])
Visit the website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
