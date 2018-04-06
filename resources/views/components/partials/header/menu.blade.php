	<button id="hamburger" class="navbar-toggler navbar-toggler-right d-none" type="button" data-toggle="collapse" data-target="#hamburger_menu" aria-controls="hamburger_menu" aria-expanded="false" aria-label="Toggle navigation">
		<h3 class="m-0"><i class="fa fa-bars text-white" aria-hidden="true"></i></h3>
	</button>
	<nav class="navbar navbar-expand-lg navbar-toggleable-md p-0">
		<div class="collapse navbar-collapse" id="hamburger_menu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/">{{__('menu.home')}}</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown-presentation" aria-haspopup="true" aria-expanded="false">
						{{__('menu.presentation.title')}}
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-presentation">
						<a class="dropdown-item" href="/about">{{__('menu.presentation.about')}}</a>
						<a class="dropdown-item" href="/mission">{{__('menu.presentation.mission')}}</a>
						<a class="dropdown-item" href="/the-team">{{__('menu.presentation.team')}}</a>
						<a class="dropdown-item" href="/breakers">{{__('menu.presentation.breakers')}}</a>
						<a class="dropdown-item" href="/partners">{{__('menu.presentation.partners')}}</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown-breaks" aria-haspopup="true" aria-expanded="false">
						{{__('menu.breaks')}}
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-breaks">
						@foreach ($categories as $category)
						<a class="dropdown-item d-flex align-items-center text-uppercase" href="{{ $category->paths()->route() }}">{{__('categories.'.$category->slug)}}<span class="badge badge-warning ml-2">{{ $category->articles_count }}</span></a>
						@endforeach
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown-breakers" aria-haspopup="true" aria-expanded="false">
						{{__('menu.for_breakers.title')}}
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-breakers">
						<a class="dropdown-item" href="/information">{{__('menu.for_breakers.information')}}</a>
						<a class="dropdown-item" href="/review-operations">{{__('menu.for_breakers.revops')}}</a>
						<a class="dropdown-item" href="/available-articles">{{__('menu.for_breakers.available')}}</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown-contact" aria-haspopup="true" aria-expanded="false">
						{{__('menu.contact.title')}}
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-contact">
						<a class="dropdown-item" href="/contact/submit-your-break">{{__('menu.contact.submit')}}</a>
						<a class="dropdown-item" href="/contact/break-inquiry">{{__('menu.contact.inquiry')}}</a>
						<a class="dropdown-item" href="/contact/ask-a-question">{{__('menu.contact.question')}}</a>
					</div>
				</li>
			</ul>
			<form method="GET" action="/search" class="form-inline my-2 my-lg-0">
				<div class="input-group" id="search-form">
					<input required type="text" name="for" class="simple-box px-0 pl-2 form-control border-0 input-sm" placeholder="{{__('menu.search')}}...">
					<span class="input-group-btn">
						<button class="btn border-0 btn-link text-white" type="submit"><i class="fas fa-search"></i></button>
					</span>
				</div>
			</form>
		</div>
	</nav>