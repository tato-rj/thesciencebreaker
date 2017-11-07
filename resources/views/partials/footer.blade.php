<footer class="container-fluid mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
				<div id="social-container" class="d-flex mb-4">
					<h5 class="m-0 mr-4"><strong>FOLLOW US</strong></h5>
					<div class="d-flex social">
						<a href="{{ config('app.facebook') }}" target="_blank">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
						<a href="{{ config('app.twitter') }}" target="_blank">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
						<a href="{{ config('app.googleplus') }}" target="_blank">
							<i class="fa fa-google-plus" aria-hidden="true"></i>
						</a>
					</div>	
				</div>
				<div class="d-flex align-items-top">
					<ul class="p-0 d-none d-sm-block">
						<p>PRESENTATION</p>
						<li>
							<a href="/about">about</a>
						</li>
						<li>
							<a href="/mission">mission</a>
						</li>
						<li>
							<a href="/the-team">the team</a>
						</li>
						<li>
							<a href="/partners">partners</a>
						</li>					
					</ul>
					<ul class=" d-none d-sm-block">
						<p>BREAKS</p>
						@foreach ($categories as $category)
						<li>
							<a href="{{ $category->path() }}">
								{{ strtolower($category->name) }}
							</a>
						</li>
						@endforeach
					</ul>
					<ul class=" d-none d-sm-block">
						<p>FOR BREAKERS</p>
						<li>					
							<a href="/information">general information</a>
						</li>
						<li>
							<a href="/faq">F.A.Q</a>
						</li>
						<li>	
							<a href="/available-articles">available articles</a>
						</li>						
					</ul>
					<ul class=" d-none d-sm-block">
						<p>CONTACT US</p>
						<li>
							<a href="/contact/ask-a-question">ask a question</a>
						</li>
						<li>
							<a href="/contact/break-inquiry">break inquiry</a>
						</li>
						<li>
							<a href="/contact/submit-your-break">submit a break</a>
						</li>
						<li>
							<a href="https://www.iubenda.com/privacy-policy/7974803" target="_blank">privacy policy</a>
						</li>						
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				{{-- SUBSCRIBE --}}
				<div>
					<h5><strong>SUBSCRIBE</strong></h5> <p class="text-muted">Stay up-to-date with the latest published Breaks!</p>
					<form method="POST" action="/admin/subscriptions">
						{{ csrf_field() }}
						<div class="form-group">
							<input required type="email" class="form-control" name="subscription" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<button type="submit" class="btn btn-theme-green btn-block">Submit</button>
					</form>
					{{-- Error --}}
					@component('admin/snippets/error')
					subscription
					@slot('feedback')
					{{ $errors->first('subscription') }}
					@endslot
					@endcomponent
				</div>
{{-- 				<div class="d-flex align-items-center mt-4">
					<h5 class="m-0 mr-4"><strong>OUR APP</strong></h5>
					<div class="d-flex align-items-center justify-content-center social">
						<a href="https://www.facebook.com/sciencebreaker/?fref=ts" target="_blank">
							<img id="apple-store" src="{{ asset('images/ios-app/apple-store.svg') }}">
						</a>
					</div>	
				</div> --}}
			</div>
		</div>
		<div class="mt-4 text-center">
			<ul class="credits pt-4">
				<li>30, Quai Ernest-Ansermet 1211 Genève 4<i class="fa fa-circle" aria-hidden="true"></i></li>
				<li>© TheScienceBreaker 2015 - 2017. All rights reserved<i class="fa fa-circle" aria-hidden="true"></i></li>
				<li>powered by <a href="https://www.leftlaneapps.com" target="_blank">LeftLane</a><i class="fa fa-circle" aria-hidden="true"></i></li>
				<li><a href="/admin/dashboard">Admin Login</a></li>
			</ul>
		</div>
	</div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fa fa-angle-up"></i>
</a>