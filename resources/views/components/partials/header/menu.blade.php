	<button id="hamburger" class="navbar-toggler navbar-toggler-right d-none" type="button" data-toggle="collapse" data-target="#hamburger_menu" aria-controls="hamburger_menu" aria-expanded="false" aria-label="Toggle navigation">
		<h3 class="m-0"><i class="fa fa-bars text-white" aria-hidden="true"></i></h3>
	</button>
	<nav class="navbar navbar-expand-lg navbar-toggleable-md p-0">
		<div class="collapse navbar-collapse" id="hamburger_menu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/">HOME</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown-presentation" aria-haspopup="true" aria-expanded="false">
						PRESENTATION
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-presentation">
						<a class="dropdown-item" href="/about">ABOUT</a>
						<a class="dropdown-item" href="/mission">MISSION</a>
						<a class="dropdown-item" href="/the-team">THE TEAM</a>
						<a class="dropdown-item" href="/breakers">BREAKERS</a>
						<a class="dropdown-item" href="/partners">PARTNERS</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown-breaks" aria-haspopup="true" aria-expanded="false">
						BREAKS
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-breaks">
						@foreach ($categories as $category)
						<a class="dropdown-item d-flex align-items-center" href="{{ $category->paths()->route() }}">{{ strtoupper($category->name) }}<span class="badge badge-warning ml-2">{{ $category->articles_count }}</span></a>
						@endforeach
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown-breakers" aria-haspopup="true" aria-expanded="false">
						FOR BREAKERS
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-breakers">
						<a class="dropdown-item" href="/information">INFORMATION FOR AUTHORS</a>
						<a class="dropdown-item" href="/faq">FAQ</a>
						<a class="dropdown-item" href="/available-articles">AVAILABLE ARTICLES</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown-contact" aria-haspopup="true" aria-expanded="false">
						CONTACT
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-contact">
						<a class="dropdown-item" href="/contact/submit-your-break">SUBMIT YOUR BREAK</a>
						<a class="dropdown-item" href="/contact/break-inquiry">BREAK INQUIRY</a>
						<a class="dropdown-item" href="/contact/ask-a-question">ASK A QUESTION</a>
					</div>
				</li>
			</ul>
			<form method="GET" action="/search" class="form-inline my-2 my-lg-0">
				<div class="input-group" id="search-form">
					<input required type="text" name="for" class="simple-box px-0 pl-2 form-control border-0 input-sm" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn border-0 btn-link text-white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</span>
				</div>
			</form>
		</div>
	</nav>