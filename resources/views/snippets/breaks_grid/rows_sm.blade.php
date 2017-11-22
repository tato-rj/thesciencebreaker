<div class="card card-horizontal-sm px-2 mb-2">
	<div class="align-items-center row no-gutters">
	<a class="card-image round-corners bg-image col-lg-3 col-sm-4 col-xs-12 my-1" href="{{ $suggestion->path() }}" style="height: 6em;background-image: url(
		@if ($suggestion->image() == 'images/no-image.png')
		{{ $suggestion->category->iconPath() }});background-size:50%">
		@else
		{{ asset($suggestion->image()) }});">
		@endif	
		
	</a>
	<div class="card-block pl-3  col-lg-9 col-sm-8 col-xs-12">
		<a class="text-default" href="{{ $suggestion->path() }}">
			<p class="card-title mb-1 two-line-clamp l-height-1"><strong>{{ $suggestion->title }}</strong></p>
		</a>
		<small class="d-block">{{ $suggestion->created_at->toFormattedDateString() }} in <a class="breaker" href="{{ $suggestion->category->path() }}"><strong>{{ $suggestion->category->name }}</strong></a> | {{ $suggestion->reading_time }} min read</small>
		<small class="d-block l-height-1">by 
			@foreach ($suggestion->authors as $author)
			{{ $loop->first ? '' : ',' }}
			<a style="margin-right: -2px;" href="{{ $author->path() }}">{{ $author->fullName() }}</a>
			@endforeach
		</small>
	</div>
	</div>
</div>	