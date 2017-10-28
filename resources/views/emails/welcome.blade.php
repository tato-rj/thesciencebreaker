@component('mail::message')
# Welcome to TheScienceBreaker!

Hello {{ $breaker->first_name }}, thank you for signing up. You have joined the team of Breakers. In case it's handy, here's are some useful tipos for new members:

- To be entitled to authorship a Break, you must be a scientist actively pursuing your research within an academic research institution.
- You can find ideas for new Breaks on the <a href="#">Available Articles</a> section of our website.
- A Break should be more than a simple summary. The purpose of a Break is to make a (complicated) scientific finding <em>accessible to a broader audience</em>.
- Share your published Breaks and <u>participate in the DISQUS discussions</u>!

<h2 class="text-center mt-3">We have Breaks in these <span class="text-green">CATEGORIES</span></h2>
<div class="d-flex flex-wrap align-items-center justify-content-center">
	<div class="category">
		<img src="https://www.thesciencebreaker.com/_files/images/breaks_icons/earthspace.svg">
	</div>
	<div class="category">
		<img src="https://www.thesciencebreaker.com/_files/images/breaks_icons/evolutionbehaviour.svg">
	</div>
	<div class="category">
		<img src="https://www.thesciencebreaker.com/_files/images/breaks_icons/healthphysiology.svg">
	</div>
	<div class="category">
		<img src="https://www.thesciencebreaker.com/_files/images/breaks_icons/mathsphysicschemistry.svg">
	</div>
	<div class="category">
		<img src="https://www.thesciencebreaker.com/_files/images/breaks_icons/microbiology.svg">
	</div>
	<div class="category">
		<img src="https://www.thesciencebreaker.com/_files/images/breaks_icons/neurobiology.svg">
	</div>
	<div class="category">
		<img src="https://www.thesciencebreaker.com/_files/images/breaks_icons/plantbiology.svg">
	</div>
	<div class="category">
		<img src="https://www.thesciencebreaker.com/_files/images/breaks_icons/socialsciences.svg">
	</div>

</div>
{{-- @component('mail::panel', ['url' => ''])

@endcomponent --}}

@component('mail::button', ['url' => 'thesciencebreaker.app'])
Visit TheScienceBreaker.com
@slot('color')
breaker
@endslot
@endcomponent

If you have any questions, send us a note at <a href="">contact@thesciencebreaker.com</a>. We'd love to help!

Cheers,<br>
The team at {{ config('app.name') }}
@endcomponent
