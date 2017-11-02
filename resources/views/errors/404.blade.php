@extends('auth/_core')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
			<h4>
				<i class="fa fa-chain-broken mr-3" aria-hidden="true"></i>Ops, something isn't right here
			</h4>
			<p>You reached this page if:</p>
			<ul>
				<li><small>You typed in the wrong web address (please double-check your spelling)</small></li>
				<li><small>Another website misspelled a link to our site</small></li>
				<li><small>You clicked somewhere on TheScienceBreaker.com, and that brought you here</small></li>
				<li><small>A monkey got loose in our server room</small></li>
			</ul>
			<p>If this problem persits, please contact <a class="text-muted" href="mailto:webmaster@thesciencebreaker.com">webmaster@thesciencebreaker.com</a> with as many details as you can.</p>
			<p><a class="text-muted" href="{{ route('home') }}">Click here</a> to return to the main page.</p>
		</div>
	</div>
</div>
@endsection