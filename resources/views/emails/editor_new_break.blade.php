@component('mail::message')

Hello {{ $user->first_name }},

Your recent edited break <a href="#">{{ $break->title }}</a> has been published!

If you have any questions, send us a note at <a href="">contact@thesciencebreaker.com</a>. We'd love to help!

Cheers,<br>
The team at {{ config('app.name') }}
@endcomponent
