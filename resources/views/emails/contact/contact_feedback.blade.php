@component('mail::message')

Hello {{ $request->full_name }},

{{ $message['body'] }}

If you have any questions, send us a note at <a href="">contact@thesciencebreaker.com</a>. We'd love to help!

Cheers,<br>
The team at {{ config('app.name') }}
@endcomponent