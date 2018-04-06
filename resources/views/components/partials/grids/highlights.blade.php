<div class="row no-gutters">
	@foreach($latest_articles as $latest)
		@if($loop->first)
			<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
				<div class="px-2 mb-2">
					<div class="row no-gutters">
					<a class="card-image round-corners bg-image col-lg-6 col-sm-12 col-md-12 col-xs-12 my-1" href="{{ $latest->paths()->route() }}" style="height: 18em;background-image: url({{$latest->paths()->image()}});">
					</a>
					<div class="pl-3 col-lg-6 col-sm-12 col-md-12 col-xs-12">
						<div class="d-flex flex-column h-100">
							<div style="flex-grow: 2">
								<h3 class=" two-line-clamp l-height-1">
									<a class="text-default" href="{{ $latest->paths()->route() }}">
										{{ $latest->resources()->localize('title') }}
									</a>
								</h3>
								<div>
									<small class="d-block">{{ $latest->created_at->toFormattedDateString() }} {{__('global.in')}} <a class="breaker" href="{{ $latest->paths()->route() }}"><strong>{{__('categories.'.$latest->category->slug)}}</strong></a> | {{ $latest->reading_time }} min {{__('global.read')}}</small>
									<small class="d-block l-height-1">{{__('global.by')}} 
										@foreach ($latest->authors as $author)
										{{ $loop->first ? '' : ',' }}
										<a style="margin-right: -2px;" href="{{ $author->paths()->route() }}">{{ $author->resources()->fullName() }}</a>
										@endforeach
									</small>
								</div>
							</div>
							<div>
								<p>{!! html_entity_decode($latest->resources()->localize('description')) !!}</p>
							</div>
						</div>
					</div>
					</div>
				</div>	
			</div>
		@else
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
				<div class="card px-2">
					<a class="card-image card-img-top round-corners bg-image mobile-default-height" href="{{ $latest->paths()->route() }}" style="height: 10em;background-image: url({{ $latest->paths()->image() }})">
						<span class="badge badge-info btn-theme-green">{{__('global.in')}} {{__('categories.'.$latest->category->slug)}}</span>
					</a>
					<div class="card-block px-2 py-3">
						<a class="text-default" href="{{ $latest->paths()->route() }}">
							<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $latest->resources()->localize('title') }}</strong></h6>
						</a>
						<small class="d-block">{{ $latest->created_at->toFormattedDateString() }} | {{ $latest->reading_time }} min {{__('global.read')}}</small>
						<small class="d-block l-height-1">{{__('global.by')}} 
							@foreach ($latest->authors as $author)
							{{ $loop->first ? '' : ',' }}
							<a style="margin-right: -2px;" href="{{ $author->paths()->route() }}">{{ $author->resources()->fullName() }}</a>
							@endforeach
						</small>
					</div>
				</div>				
			</div>
		@endif
	@endforeach

</div>



{{-- <div class="col-lg-6 col-md-12">
	<div class="card px-2">
		<a class="card-image card-img-top round-corners bg-image" href="{{ $highlights->get(0)->article->paths()->route() }}" style="height: 22em;background-image: url({{ $highlights->get(0)->article->paths()->image() }})">
			<span class="badge badge-info btn-theme-green">{{__('global.in')}} {{__('categories.'.$highlights->get(0)->article->category->slug)}}</span>
		</a>
		<div class="card-block px-2 py-3">
			<a class="text-default" href="{{ $highlights->get(0)->article->paths()->route() }}">
				<h4 class="card-title mb-2">{{ $highlights->get(0)->article->resources()->localize('title') }}</h4>
			</a>
			<p class="card-text text-muted mb-2 l-height-1">{{ $highlights->get(0)->article->resources()->localize('description') }}</p>
			<small class="d-block">{{__('global.published')}} {{ $highlights->get(0)->article->created_at->toFormattedDateString() }}</small>
			<small>{{__('global.by')}} 
			@foreach ($highlights->get(0)->article->authors as $author)
			{{ $loop->first ? '' : ',' }}
			<a style="margin-right: -2px;" href="{{ $author->paths()->route() }}">{{ $author->resources()->fullName() }}</a>
			@endforeach
			| {{ $highlights->get(0)->article->reading_time }} min {{__('global.read')}}</small>
		</div>
	</div>
</div>
<div class="col-lg-6 col-md-12">
	<div class="row no-gutters">
		<div class="col-lg-6 col-md-6 col-xs-12">
			<div class="card px-2">
				<a class="card-image card-img-top round-corners bg-image mobile-default-height" href="{{ $highlights->get(1)->article->paths()->route() }}" style="height: 10em;background-image: url({{ $highlights->get(1)->article->paths()->image() }})">
					<span class="badge badge-info btn-theme-green">{{__('global.in')}} {{__('categories.'.$highlights->get(1)->article->category->slug)}}</span>
				</a>
				<div class="card-block px-2 py-3">
					<a class="text-default" href="{{ $highlights->get(1)->article->paths()->route() }}">
						<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(1)->article->resources()->localize('title') }}</strong></h6>
					</a>
					<p class="card-text text-muted mb-2 l-height-1 two-line-clamp">{{ $highlights->get(1)->article->resources()->localize('description') }}</p>
					<small class="d-block">{{ $highlights->get(1)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(1)->article->reading_time }} min {{__('global.read')}}</small>
				</div>
			</div>					
		</div>
		<div class="col-lg-6 col-md-6 col-xs-12">
			<div class="card px-2">
				<a class="card-image card-img-top round-corners bg-image mobile-default-height" href="{{ $highlights->get(2)->article->paths()->route() }}" style="height: 10em;background-image: url({{ $highlights->get(2)->article->paths()->image() }})">
					<span class="badge badge-info btn-theme-green">{{__('global.in')}} {{__('categories.'.$highlights->get(2)->article->category->slug)}}</span>
				</a>
				<div class="card-block px-2 py-3">
					<a class="text-default" href="{{ $highlights->get(2)->article->paths()->route() }}">
						<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(2)->article->resources()->localize('title') }}</strong></h6>
					</a>
					<p class="card-text text-muted mb-2 l-height-1 two-line-clamp">{{ $highlights->get(2)->article->resources()->localize('description') }}</p>
					<small class="d-block">{{ $highlights->get(2)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(2)->article->reading_time }} min {{__('global.read')}}</small>
				</div>
			</div>	
		</div>
	</div>
	<div class="row no-gutters">
		<div class="col-lg-5 hidden-md-down">
			<div class="card px-2">
				<a class="card-image card-img-top round-corners bg-image mobile-default-height" href="{{ $highlights->get(3)->article->paths()->route() }}" style="height: 8em;background-image: url({{ $highlights->get(3)->article->paths()->image() }})">
					<span class="badge badge-info btn-theme-green">{{__('global.in')}} {{__('categories.'.$highlights->get(3)->article->category->slug)}}</span>
				</a>
				<div class="card-block px-2 py-3">
					<a class="text-default" href="{{ $highlights->get(3)->article->paths()->route() }}">
						<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(3)->article->resources()->localize('title') }}</strong></h6>
					</a>
					<p class="card-text text-muted mb-2 l-height-1 one-line-clamp">{{ $highlights->get(3)->article->resources()->localize('description') }}</p>
					<small class="d-block">{{ $highlights->get(3)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(3)->article->reading_time }} min {{__('global.read')}}</small>
				</div>
			</div>							
		</div>
		<div class="col-lg-7 col-md-12">
			<div class="card px-2 h-auto">
				<div class="card-block">
					<a class="text-default" href="{{ $highlights->get(4)->article->paths()->route() }}">
						<h6 class="card-title mb-2 two-line-clamp l-height-1"><strong>{{ $highlights->get(4)->article->resources()->localize('title') }}</strong></h6>
					</a>
					<small class="d-block">{{ $highlights->get(4)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(4)->article->reading_time }} min {{__('global.read')}}</small>
				</div>
			</div>
			<hr class="my-2">
			<div class="card px-2 h-auto">
				<div class="card-block">
					<a class="text-default" href="{{ $highlights->get(5)->article->paths()->route() }}">
						<h6 class="card-title mb-2 two-line-clamp l-height-1"><strong>{{ $highlights->get(5)->article->resources()->localize('title') }}</strong></h6>
					</a>
					<small class="d-block">{{ $highlights->get(5)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(5)->article->reading_time }} min {{__('global.read')}}</small>
				</div>
			</div>	
			<hr class="my-2">
			<div class="card px-2 h-auto">
				<div class="card-block">
					<a class="text-default" href="{{ $highlights->get(6)->article->paths()->route() }}">
						<h6 class="card-title mb-2 two-line-clamp l-height-1"><strong>{{ $highlights->get(6)->article->resources()->localize('title') }}</strong></h6>
					</a>
					<small class="d-block">{{ $highlights->get(6)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(6)->article->reading_time }} min {{__('global.read')}}</small>
				</div>
			</div>					
		</div>
	</div>
</div> --}}