<div class="card card-horizontal-sm px-2 mb-2">
	<div class="align-items-center row no-gutters">
	<a class="card-image round-corners bg-image col-lg-3 col-sm-4 col-xs-12 my-1" href="{{ $suggestion->paths()->route() }}" style="height: 6em;background-image: url(
		@if ($suggestion->paths()->image() == 'images/no-image.png')
		{{ $suggestion->category->paths()->icon() }});background-size:50%">
		@else
		{{ asset($suggestion->paths()->image()) }});">
		@endif	
		
	</a>
	<div class="card-block pl-3  col-lg-9 col-sm-8 col-xs-12">
		<a class="text-default" href="{{ $suggestion->paths()->route() }}">
			<p class="card-title mb-1 two-line-clamp l-height-1"><strong>{{ $suggestion->resources()->localize('title') }}</strong></p>
		</a>
		<small class="d-block">{{ $suggestion->published_at->toFormattedDateString() }} {{__('global.in')}} <a class="breaker" href="{{ $suggestion->category->paths()->route() }}"><strong>{{ $suggestion->category->name }}</strong></a> | {{ $suggestion->reading_time }} min {{__('global.read')}}</small>
		<small class="d-block l-height-1">{{__('global.by')}} 
			@foreach ($suggestion->authors as $author)
			{{ $loop->first ? '' : ',' }}
			<a style="margin-right: -2px;" href="{{ $author->paths()->route() }}">{{ $author->resources()->fullName() }}</a>
			@endforeach
		</small>
	</div>
	</div>
</div>	