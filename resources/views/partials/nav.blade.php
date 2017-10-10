<nav class="navbar navbar-toggleable-md p-0 mt-3">
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">HOME</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
					PRESENTATION
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">ABOUT</a>
					<a class="dropdown-item" href="#">MISSION</a>
					<a class="dropdown-item" href="#">THE TEAM</a>
					<a class="dropdown-item" href="#">PARTNERS</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
					BREAKS
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">HEALTH & PHYSIOLOGY</a>
					<a class="dropdown-item" href="#">NEUROBIOLOGY</a>
					<a class="dropdown-item" href="#">EARTH & SPACE</a>
					<a class="dropdown-item" href="#">EVOLUTION & BEHAVIOUR</a>
					<a class="dropdown-item" href="#">PLANT BIOLOGY</a>
					<a class="dropdown-item" href="#">MICROBIOLOGY</a>
					<a class="dropdown-item" href="#">MATHS, PHYSICS & CHEMISTRY</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
					FOR BREAKERS
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">INFORMATION</a>
					<a class="dropdown-item" href="#">FAQ</a>
					<a class="dropdown-item" href="#">AVAILABLE ARTICLES</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">CONTACT</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			{{ csrf_field() }}
			<div class="input-group" id="search-form">
				<input type="text" class="form-control border-0 input-sm" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn border-0" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
				</span>
			</div>
		</form>
	</div>
</nav>