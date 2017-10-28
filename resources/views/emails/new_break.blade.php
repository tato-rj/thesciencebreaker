@component('mail::message')
# Congratulations {{ $user->first_name }}!

<strong>{{$break->title}}</strong> has been published.

<a href="thesciencebreaker.app/{{ $break->path() }}"><button>Check it out</button></a>

Thanks,<br>
{{ config('app.owner') }}<br>
Founder of {{ config('app.name') }}
@endcomponent
