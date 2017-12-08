<footer class="container-fluid mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
				<div id="social-container" class="d-flex mb-4">
					<h5 class="m-0 mr-4"><strong>{{__('footer.follow')}}</strong></h5>
					<div class="d-flex social">
						<a href="{{ config('app.facebook') }}" target="_blank">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="{{ config('app.twitter') }}" target="_blank">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="{{ config('app.googleplus') }}" target="_blank">
							<i class="fab fa-google-plus-g"></i>
						</a>
					</div>	
				</div>
				<div class="d-flex align-items-top">
					<ul class="p-0 d-none d-lg-block">
						<p>{{__('menu.presentation.title')}}</p>
						<li>
							<a href="/about">{{strtolower(__('menu.presentation.about'))}}</a>
						</li>
						<li>
							<a href="/mission">{{strtolower(__('menu.presentation.mission'))}}</a>
						</li>
						<li>
							<a href="/the-team">{{strtolower(__('menu.presentation.team'))}}</a>
						</li>
						<li>
							<a href="/breakers">breakers</a>
						</li>
						<li>
							<a href="/partners">{{strtolower(__('menu.presentation.partners'))}}</a>
						</li>					
					</ul>
					<ul class=" d-none d-lg-block">
						<p>BREAKS</p>
						@foreach ($categories as $category)
						<li>
							<a href="{{ $category->paths()->route() }}">
								{{strtolower(__('categories.'.$category->slug))}}
							</a>
						</li>
						@endforeach
					</ul>
					<ul class=" d-none d-lg-block">
						<p>{{__('menu.for_breakers.title')}}</p>
						<li>					
							<a href="/information">{{strtolower(__('menu.for_breakers.information'))}}</a>
						</li>
						<li>
							<a href="/faq">{{strtolower(__('menu.for_breakers.faq'))}}</a>
						</li>
						<li>	
							<a href="/available-articles">{{strtolower(__('menu.for_breakers.available'))}}</a>
						</li>						
					</ul>
					<ul class=" d-none d-lg-block">
						<p>{{__('menu.contact.title')}}</p>
						<li>
							<a href="/contact/submit-your-break">{{strtolower(__('menu.contact.submit'))}}</a>
						</li>
						<li>
							<a href="/contact/break-inquiry">{{strtolower(__('menu.contact.inquiry'))}}</a>
						</li>
						<li>
							<a href="/contact/ask-a-question">{{strtolower(__('menu.contact.question'))}}</a>
						</li>
						<li>
							<a href="https://www.iubenda.com/privacy-policy/7974803" target="_blank">{{strtolower(__('menu.privacy'))}}</a>
						</li>						
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mx-auto">
				{{-- SUBSCRIBE --}}
				<div>
					<h5><strong>{{__('footer.subscribe.title')}}</strong></h5> <p class="text-muted">{{__('footer.subscribe.text')}}</p>
					<form method="POST" action="/admin/subscriptions">
						{{ csrf_field() }}
						<div class="form-group">
							<input required type="email" class="form-control" name="subscription" placeholder="{{__('footer.subscribe.input')}}">
							<small id="emailHelp" class="form-text text-muted">{{__('footer.subscribe.note')}}</small>
						</div>
						<input type="submit" value="{{__('footer.subscribe.button')}}" class="btn btn-theme-green btn-block">
					</form>
				</div>
			</div>
		</div>
		<div class="mt-4 text-center">
			<ul class="credits pt-4">
				<li>30, Quai Ernest-Ansermet 1211 Genève 4<i class="fa fa-circle" aria-hidden="true"></i></li>
				<li>© TheScienceBreaker 2015 - 2017. {{__('footer.copyright')}}<i class="fa fa-circle" aria-hidden="true"></i></li>
				<li>powered by <a href="https://www.leftlaneapps.com" target="_blank">LeftLane</a><i class="fa fa-circle" aria-hidden="true"></i></li>
				<li><a href="/admin/dashboard" target="_blank">Admin Login</a></li>
			</ul>
		</div>
	</div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fa fa-angle-up"></i>
</a>

@if ($flash = session('contact'))
    @include('components/alerts/success')
@endif

@if ($flash = session('subscription'))
    @include('components/alerts/success')
@endif

@if ($errors->any())
    @include('components/alerts/error')
@endif