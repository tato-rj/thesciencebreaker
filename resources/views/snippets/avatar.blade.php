<figure class="figure avatar" title="Click to learn more about {{ $member->first_name }}">
	<img src="/images/avatars/{{ $member->last_name }}.png" class="figure-img img-fluid">
	<figcaption class="figure-caption"><strong>{{ $member->fullName() }}</strong>{{ $member->position }}</figcaption>
	<div class="about">
		<p class="no-indent text-green text-left"><strong>{{ $member->first_name }}'s biography</strong></p>
		<p class="m-0 text-justify mb-3">{{ $member->biography }}</p>
		<div class="d-flex align-items-center justify-content-center">
			<a href="">
				<i class="fa fa-envelope-open text-green" aria-hidden="true"></i>
			</a>
			<a href="">
				<i class="fa fa-facebook text-green" aria-hidden="true"></i>
			</a>
			<a href="">
				<i class="fa fa-twitter text-green" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</figure>
