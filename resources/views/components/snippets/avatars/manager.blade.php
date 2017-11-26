<a href="{{$member->path()}}" class="breaker">
	<figure class="figure avatar" title="Click to learn more about {{ $member->first_name }}">
		<img src="{{ asset($member->avatar()) }}" class="figure-img img-fluid">
		<figcaption class="figure-caption"><strong class="text-green">{{ $member->fullName() }}</strong>{{ $member->position }}</figcaption>
	</figure>
</a>