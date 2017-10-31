@extends('_core')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			@component('snippets.title')
			Mission
			@endcomponent
			<p>More and more, science and society are pulled apart by fears, misunderstandings and manipulated information. TheScienceBreaker wants to break this wall of miscommunication. By doing this, the seed of a new informed generation could eventually germinate on the solid ground of a shared scientific consciousness.</p>
			<div class="highlight">
				The mission of TheScienceBreaker is to engage the public with science and technology through the democratization of scientific literature.
			</div>
			<p>We believe that science is made by the people for the people with no discrimination of gender, faith, ethnic origin, age, political view, sexual behaviors or whatsoever. Not respecting this principle will generate pitfalls of isolation where misused information becomes an illusion of science and science, in turn, is left as an impotent observer.</p>
			<div class="text-center mt-5">
				<a href="#" class="btn bg-default text-white" id="breaker-btn"><img src="/images/logo-small.svg"><strong>LEARN HOW TO BECOME A BREAKER</strong></a>
			</div>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
