@extends('app', ['pagetitle' => $article->title])

@section('earlyJS')
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '1737765819883440',
			xfbml      : true,
			version    : 'v2.8'
		});
		FB.AppEvents.logPageView();
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
@endsection

@section('content')

<div class="container mt-4">
	<div class="row">
		
		{{-- Social Icons --}}
		@include('components/partials/side_bars/social')

		{{-- Break Content --}}
		<div id="break" class="col-lg-8 col-md-12">
			<div class="tags mb-3">
				@foreach ($article->tags as $tag)
				<a href="{{ $tag->path() }}">
					<span class="badge badge-pill">{{ $tag->name }}</span>
				</a>
				@endforeach
			</div>

			{{-- Category --}}
			<h5 class="category-title d-flex align-items-center">
				<img class="mr-2" src="{{ $article->category->paths()->icon() }}"><a href="{{ $article->category->paths()->route() }}">{{__('categories.'.$article->category->slug)}}</a>
			</h5>

			{{-- Title --}}
			<h3><strong>{{ $article->resources()->localize('title') }}</strong></h3>
			<p class="text-muted">{{ $article->resources()->localize('description') }}</p>

			{{-- Image --}}
			{{-- @if ($article->paths()->image() != 'images/no-image.png') --}}
			<figure class="figure cover-image mb-0">
				<img src="{{ $article->paths()->image() }}" class="figure-img img-fluid rounded" alt="{{ $article->image_caption }}">
				<figcaption class="figure-caption"><small>{{ $article->image_caption }} <strong>Credits: {{ $article->image_credits }}</strong></small></figcaption>
			</figure>
			{{-- @endif --}}

			{{-- Open access, cc and doi link --}}
			<div class="d-flex justify-content-between mt-3">
				<div class="d-flex align-items-end">
					<a href="https://en.wikipedia.org/wiki/Open_access" target="_blank">
						<img src="/images/util-icons/open-access.svg">
					</a>
					<a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">
						<img src="/images/util-icons/cc.svg" class="ml-2">
					</a>
					<div data-badge-type="1" data-doi="{{$article->doi}}" data-hide-no-mentions="true" data-hide-less-than="1" class="altmetric-embed ml-2"></div>
				</div>
				<div>
					<a id="doi" href="{{ $article->doi }}"><small>{{ $article->doi }}</small></a>
				</div>
			</div>

			{{-- Author --}}
			<div id="author-bar" class="mt-2 pt-1 mb-2 pb-1 d-flex align-items-center justify-content-between">
				<div>
					<small>{{__('global.by')}} 
						@foreach ($article->authors as $author)
						{{ $loop->first ? '' : ', ' }}
						<span class="popover-wrapper">
							<a data-role="popover" class="author text-orange cursor-link" data-url="{{ $author->paths()->route() }}" data-target="{{ $author->slug }}-popover">{{ $author->resources()->fullName() }}</a> | {{ $author->position }}
							<div class="popover-modal p-3 {{ $author->slug }}-popover">
								<div class="popover-body popover-body-padded">
									<p class="mb-2"><i class="fa fa-user mr-2" aria-hidden="true"></i><strong>{{ $author->resources()->fullName() }}</strong> is {{ $author->position }} at {{ $author->research_institute }}.</p>
									@if ($author->isOriginalAuthorOf($article->id))
									<p class="mb-0 text-green">
										<strong>{{ $author->resources()->fullName() }} is also an author of the <a>original article</a></strong>
									</p>
									@endif
									<div class="text-right">
										<a href="{{ $author->paths()->route() }}" class="btn bg-default no-hover py-0 px-3 btn-sm" target="_blank">Profile</a>
									</div>
									
								</div>
							</div>
						</span>
						@endforeach
					</small>
				</div>
				<div class="d-xs-none">
					<span class="popover-wrapper">
						<a data-role="popover" data-target="{{ $article->editor->slug }}-popover"><i class="ml-1 fa fa-info-circle"></i></a>
						<div class="popover-modal editor p-3 {{ $author->slug }}-popover">
							<div class="popover-body popover-body-padded">
								<small>
									<p class="mb-1"><strong>Edited by</strong></p>
									<p class="mb-0"> {{ $article->editor->resources()->fullName() }}</p>
									<p class="mb-2 text-muted"><em>{{ $article->editor->position }}</em></p>
									<a href="{{ $article->editor->paths()->route() }}" class="btn bg-default no-hover p-0 btn-block btn-sm" target="_blank">Profile</a>
								</small>
							</div>
						</div>
					</span>					
				</div>
			</div>

			{{-- Reading time and date --}}
			<div class="d-flex justify-content-between align-items-center reading-time">
				<div>
					<i class="fa fa-eye" aria-hidden="true"></i>
					<small><span>{{ucfirst(__('global.views'))}} </span>{{ $article->views }}</small>
				</div>
				<div class="flex-grow ml-2">
					<i class="far fa-clock"></i>
					<small><span>{{__('global.reading_time')}} </span>{{ $article->reading_time }} min</small>
				</div>
				<div>
					<small>{{__('global.published')}} {{ $article->published_at ? $article->published_at->toFormattedDateString() : null }}</small>
				</div>
			</div>

			{{-- Body --}}
			<div id="break-text" class="mt-4">
				{!! html_entity_decode($article->resources()->localize('content')) !!}
				<div class="mt-4">
					<h5 class="mt-3 text-dark">Original Article:</h5>
					{!! html_entity_decode($article->original_article) !!}
				</div>
			</div>

			{{-- Suggestion (based on tag) --}}
			<div class="mt-4">
				<hr>
				<p class="mb-0"><strong>Next read:</strong> <a href="{{ $next_read->paths()->route() }}">{{ $next_read->title }}</a>
					<small>by 
						@foreach ($next_read->authors as $author)
						{{ $loop->first ? '' : ', ' }}
						<a class="breaker" href="{{ $author->paths()->route() }}">{{ $author->resources()->fullName() }}</a>
					@endforeach</small></p>
				</div>
				<hr>

				{{-- Editor --}}
				<div id="credits" class="mt-4">
					<div class="d-block d-sm-none">
						<h5>Edited by:</h5>
						<p>
							<strong>
								<a href="{{ $article->editor->paths()->route() }}" class="breaker">{{ $article->editor->resources()->fullName() }}</a>
							</strong>, {{ $article->editor->position }}
						</p>
					</div>
				</div>

				{{-- DISQUS --}}
				<div id="disqus_thread" class="mt-4 mb-5"></div>

				{{-- Suggestions (based on tag) --}}
				<div>
					<h5 class="p-1 pl-2 bg-green text-white">
						We thought you might like
					</h5>
					@foreach ($more_like as $suggestion)
					@include('components/partials/grids/rows')			
					@endforeach
				</div>
				{{-- Suggestions (based on category) --}}
				<div class="mt-4">
					<h5 class="p-1 pl-2 bg-green text-white">
						More from <a href="{{ $article->category->paths()->route() }}">{{ $article->category->name }}</a>
					</h5>
					@foreach ($more_from as $suggestion)
					@include('components/partials/grids/rows')			
					@endforeach
				</div>
			</div>

		{{-- Side Bar: Suggestion --}}
		@include('components/partials/side_bars/suggestions')

	</div>
</div>

@endsection

@section('scripts')
	@include('javascript/article')
@endsection
