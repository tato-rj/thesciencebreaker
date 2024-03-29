<div id="title-container" class="mb-3">
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10">
			<div class="d-flex align-items-center">
				<a href="/"><img src="/images/{{__('global.logo_name')}}.svg" id="title"></a>
				<a href="/"><img src="/images/logo-small.svg" class="d-none" id="title_mobile"></a>
				<div id="buttons-container" class="ml-5 d-none d-lg-block">
					<a href="/contact/submit-your-break" class="btn btn-block"><i class="fas fa-upload mr-2" aria-hidden="true"></i><span>{{__('menu.contact.submit')}}</span></a>
					<a href="/contact/break-inquiry" class="btn btn-block"><i class="fas fa-newspaper mr-2" aria-hidden="true"></i><span>{{__('menu.contact.inquiry')}}</span></a>
				</div>
			</div>					
		</div>
		<div class="col-2 text-right flex-column justify-content-between d-none d-lg-flex" id="partner-container">
			<form method="POST" action="/language">
				{{csrf_field()}}
				<div class="text-white">
					<button class="btn btn-link no-border text-white" name="language" value="en">EN</button> 
					/ <button class="btn btn-link no-border text-white" name="language" value="fr">FR</button>
				</div>
			</form>
			<div>
				<small class="text-white">{{__('menu.partner')}}:</small>
				<a href="http://www.unige.ch/" target="_blank">
					<img src="/images/university.svg">
				</a>
			</div>
		</div>				
	</div>
</div>
