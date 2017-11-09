@component('mail::message')
# Welcome to TheScienceBreaker!

Hello {{ $breaker->first_name }}, thank you for signing up. You have joined the team of Breakers. In case it's handy, here's are some useful tipos for new members:

<ul class="list">
	<li class="d-flex align-items-center mb-1">
		<h1>1</h1>
		<span>To be entitled to authorship a Break, you must be a scientist actively pursuing your research within an academic research institution.</span>
	</li>
	<li class="d-flex align-items-center mb-1">
		<h1>2</h1>
		<span>You can find ideas for new Breaks on the <a href="{{ config('app.url') }}/available-articles">Available Articles</a> section of our website.</span>
	</li>
	<li class="d-flex align-items-center mb-1">
		<h1>3</h1>
		<span>A Break should be more than a simple summary. The purpose of a Break is to make a (complicated) scientific finding <em>accessible to a broader audience</em>.</span>
	</li>
	<li class="d-flex align-items-center mb-1">
		<h1>4</h1>
		<span>Share your published Breaks and <u>participate in the DISQUS discussions</u>!</span>
	</li>
</ul>

<h2 class="text-center text-green mt-3">AVAILABLE CATEGORIES</h2>
<div class="d-flex flex-wrap align-items-center justify-content-center">
	<div class="category">
		<a href="{{ config('app.url') }}/breaks/earth-space">
			<img src="{{ config('app.url') }}/_files/images/breaks_icons/earthspace.svg">
		</a>
	</div>
	<div class="category">
		<a href="{{ config('app.url') }}/breaks/evolution-behaviour">
			<img src="{{ config('app.url') }}/_files/images/breaks_icons/evolutionbehaviour.svg">
		</a>
	</div>
	<div class="category">
		<a href="{{ config('app.url') }}/breaks/health-physiology">
			<img src="{{ config('app.url') }}/_files/images/breaks_icons/healthphysiology.svg">
		</a>
	</div>
	<div class="category">
		<a href="{{ config('app.url') }}/breaks/maths-physics-chemistry">
			<img src="{{ config('app.url') }}/_files/images/breaks_icons/mathsphysicschemistry.svg">
		</a>
	</div>
	<div class="category">
		<a href="{{ config('app.url') }}/breaks/microbiology">
			<img src="{{ config('app.url') }}/_files/images/breaks_icons/microbiology.svg">
		</a>
	</div>
	<div class="category">
		<a href="{{ config('app.url') }}/breaks/neurobiology">
			<img src="{{ config('app.url') }}/_files/images/breaks_icons/neurobiology.svg">
		</a>
	</div>
	<div class="category">
		<a href="{{ config('app.url') }}/breaks/plantbiology">
			<img src="{{ config('app.url') }}/_files/images/breaks_icons/plantbiology.svg">
		</a>
	</div>
	<div class="category">
		<a href="{{ config('app.url') }}/breaks/psychology">
			<img src="{{ config('app.url') }}/_files/images/breaks_icons/psychology.svg">
		</a>
	</div>

</div>
{{-- @component('mail::panel', ['url' => ''])

@endcomponent --}}

@component('mail::button', ['url' => config('app.url')])
Visit TheScienceBreaker.com
	@slot('color')
	breaker
	@endslot
@endcomponent

If you have any questions, send us a <a href="mailto:{{ config('app.email') }}">note</a>. We'd love to help!

Cheers,<br>
The team at {{ config('app.name') }}
@endcomponent
