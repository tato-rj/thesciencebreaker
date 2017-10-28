@component('mail::message')
# Congratulations {{ $user->first_name }}!

Your Break <a href="#">{{$break->title}}</a> has been published.

@component('mail::button', ['url' => $break->path()])
Check it out
@endcomponent

If you have any questions, send us a note at <a href="">contact@thesciencebreaker.com</a>. We'd love to help!

Cheers,<br>
The team at {{ config('app.name') }}
@endcomponent
