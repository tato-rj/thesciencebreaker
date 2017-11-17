<div id="profile" class="text-center">
	<img src="{{ asset($member->avatar()) }}" class="p-4 img-fluid">
	<h5 class="mb-0">{{ $member->fullName() }}</h5>
	<p class="mb-2"><small>{{ $member->position }}</small></p>
	<div class="d-flex align-items-center justify-content-center">
		<h5>
		<a class="no-a-underline" href="{{ config('app.facebook') }}" target="_blank">
			<i class="fa fa-facebook m-1" aria-hidden="true"></i>
		</a>
		<a class="no-a-underline" href="{{ config('app.twitter') }}" target="_blank">
			<i class="fa fa-twitter m-1" aria-hidden="true"></i>
		</a>
		<a class="no-a-underline" href="mailto:{{ $member->email }}" target="_blank">
			<i class="fa fa-envelope m-1" aria-hidden="true"></i>
		</a>
	</h5>
	</div>
</div>