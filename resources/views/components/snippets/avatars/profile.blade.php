<div id="profile" class="text-center">
	<img src="{{ asset($member->paths()->avatar()) }}" class="p-4 img-fluid">
	<h5 class="mb-0">{{ $member->resources()->fullName() }}</h5>
	<p class="mb-2"><small>{{ $member->position }}</small></p>
	<div class="d-flex align-items-center justify-content-center">
		<h5>
		<a class="no-a-underline" href="{{ config('app.facebook') }}" target="_blank">
			<i class="fab m-2 fa-facebook-f"></i>
		</a>
		<a class="no-a-underline" href="{{ config('app.twitter') }}" target="_blank">
			<i class="fab m-2 fa-twitter"></i>
		</a>
		<a class="no-a-underline" href="mailto:{{ $member->email }}" target="_blank">
			<i class="fa m-2 fa-envelope-open" aria-hidden="true"></i>
		</a>
	</h5>
	</div>
</div>