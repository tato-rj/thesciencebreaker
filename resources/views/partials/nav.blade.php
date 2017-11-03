<nav class="navbar navbar-expand-lg navbar-toggleable-md p-0">
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/">HOME</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
					PRESENTATION
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="/about">ABOUT</a>
					<a class="dropdown-item" href="/mission">MISSION</a>
					<a class="dropdown-item" href="/the-team">THE TEAM</a>
					<a class="dropdown-item" href="/partners">PARTNERS</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
					BREAKS
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					@foreach ($categories as $category)
						<a class="dropdown-item d-flex align-items-center" href="{{ $category->path() }}">{{ strtoupper($category->name) }}<span class="badge badge-warning ml-2">{{ $category->articles_count }}</span></a>
					@endforeach
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
					FOR BREAKERS
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="/information">INFORMATION</a>
					<a class="dropdown-item" href="/faq">FAQ</a>
					<a class="dropdown-item" href="/available-articles">AVAILABLE ARTICLES</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
					CONTACT
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="/contact/ask-a-question">ASK A QUESTION</a>
					<a class="dropdown-item" href="/contact/break-inquiry">BREAK INQUIRY</a>
					<a class="dropdown-item" href="/contact/submit-your-break">SUBMIT YOUR BREAK</a>
				</div>
			</li>
		</ul>
		<form method="GET" action="/search" class="form-inline my-2 my-lg-0">
			<div class="input-group" id="search-form">
				<input type="text" name="for" class="form-control border-0 input-sm" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn border-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</span>
			</div>
		</form>
	</div>
</nav>