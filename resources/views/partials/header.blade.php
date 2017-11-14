<header>
	<div class="container">
		<div id="title-container" class="mb-3">
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-10">
					<div class="d-flex align-items-center">
						<a href="{{ config('app.url') }}"><img src="/images/logo.svg" id="title"></a>
						<img src="/images/logo-small.svg" class="d-none" id="title_mobile">
						<div id="buttons-container" class="ml-5 d-none d-lg-block">
							<a href="/contact/submit-your-break" class="btn btn-block"><i class="fa fa-upload mr-2" aria-hidden="true"></i><span>SUBMIT YOUR BREAK</span></a>
							<a href="/contact/break-inquiry" class="btn btn-block"><i class="fa fa-newspaper-o mr-2" aria-hidden="true"></i><span>BREAK INQUIRY</span></a>
						</div>
					</div>					
				</div>
				<div class="col-2  d-none d-lg-block" id="partner-container">
					<a href="http://www.unige.ch/" target="_blank">
						<img src="/images/university-partner.svg">
					</a>
				</div>				
			</div>
		</div>

	@include('partials.nav')

	</div>	
</header>