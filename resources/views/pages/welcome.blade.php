@extends('_core')

@section('content')

<div id="overlay">
	<img src="{{ asset('images/logo-small.svg') }}">
</div>

<div class="container">
	{{-- INTRO --}}
	<div class="row mt-4 jumbotron mb-2 d-none d-sm-flex">
		<div class="col-lg-6">
			<div class="mb-2">
				<h4>Why TheScienceBreaker?</h4>
				<p class="mb-0">TheScienceBreaker promotes the dialogue and the dissemination of a scientific culture so that society-relevant opinions can be discussed and decisions may be taken accordingly. Discover our <a href="/mission">mission</a>.</p>
			</div>			
		</div>
		<div class="col-lg-6">
			<div class="mb-2">
				<h4>What is a Break?</h4>
				<p class="mb-0">We publish short lay summaries, called Breaks, where scientific papers are explained by scientists, called Breakers, directly involved in the field of research. <a href="/about">Learn more</a></p>
			</div>			
		</div>
	</div>
	<div class="row no-gutters mt-4">
		<div class="col-lg-12">
			@component('snippets.title')
			Highlights
			@endcomponent
		</div>
		<div class="col-lg-6 col-md-12">
			<div class="card px-2">
				<a class="card-image card-img-top round-corners bg-image" href="{{ $highlights->get(0)->article->path() }}" style="height: 22em;background-image: url({{ $highlights->get(0)->article->image() }})">
					<span class="badge badge-info btn-theme-green">in {{ $highlights->get(0)->article->category->name }}</span>
				</a>
				<div class="card-block px-2 py-3">
					<a class="text-default" href="{{ $highlights->get(0)->article->path() }}">
						<h4 class="card-title mb-2"><strong>{{ $highlights->get(0)->article->title }}</strong></h4>
					</a>
					<p class="card-text text-muted mb-2 l-height-1">{{ $highlights->get(0)->article->description }}</p>
					<small class="d-block">published on {{ $highlights->get(0)->article->created_at->toFormattedDateString() }}</small>
					<small>by 
						@foreach ($highlights->get(0)->article->authors as $author)
						{{ $loop->first ? '' : ',' }}
						<a style="margin-right: -2px;" href="{{ $author->path() }}">{{ $author->fullName() }}</a>
						@endforeach
						| {{ $highlights->get(0)->article->reading_time }} min read</small>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-6 col-xs-12">
						<div class="card px-2">
							<a class="card-image card-img-top round-corners bg-image mobile-default-height" href="{{ $highlights->get(1)->article->path() }}" style="height: 10em;background-image: url({{ $highlights->get(1)->article->image() }})">
								<span class="badge badge-info btn-theme-green">in {{ $highlights->get(1)->article->category->name }}</span>
							</a>
							<div class="card-block px-2 py-3">
								<a class="text-default" href="{{ $highlights->get(1)->article->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(1)->article->title }}</strong></h6>
								</a>
								<p class="card-text text-muted mb-2 l-height-1 two-line-clamp">{{ $highlights->get(1)->article->description }}</p>
								<small class="d-block">{{ $highlights->get(1)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(1)->article->reading_time }} min read</small>
							</div>
						</div>					
					</div>
					<div class="col-lg-6 col-md-6 col-xs-12">
						<div class="card px-2">
							<a class="card-image card-img-top round-corners bg-image mobile-default-height" href="{{ $highlights->get(2)->article->path() }}" style="height: 10em;background-image: url({{ $highlights->get(2)->article->image() }})">
								<span class="badge badge-info btn-theme-green">in {{ $highlights->get(2)->article->category->name }}</span>
							</a>
							<div class="card-block px-2 py-3">
								<a class="text-default" href="{{ $highlights->get(2)->article->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(2)->article->title }}</strong></h6>
								</a>
								<p class="card-text text-muted mb-2 l-height-1 two-line-clamp">{{ $highlights->get(2)->article->description }}</p>
								<small class="d-block">{{ $highlights->get(2)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(2)->article->reading_time }} min read</small>
							</div>
						</div>	
					</div>
				</div>
				<div class="row no-gutters">
					<div class="col-lg-5 hidden-md-down">
						<div class="card px-2">
							<a class="card-image card-img-top round-corners bg-image mobile-default-height" href="{{ $highlights->get(3)->article->path() }}" style="height: 8em;background-image: url({{ $highlights->get(3)->article->image() }})">
								<span class="badge badge-info btn-theme-green">in {{ $highlights->get(3)->article->category->name }}</span>
							</a>
							<div class="card-block px-2 py-3">
								<a class="text-default" href="{{ $highlights->get(3)->article->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(3)->article->title }}</strong></h6>
								</a>
								<p class="card-text text-muted mb-2 l-height-1 one-line-clamp">{{ $highlights->get(3)->article->description }}</p>
								<small class="d-block">{{ $highlights->get(3)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(3)->article->reading_time }} min read</small>
							</div>
						</div>							
					</div>
					<div class="col-lg-7 col-md-12">
						<div class="card px-2 h-auto">
							<div class="card-block">
								<a class="text-default" href="{{ $highlights->get(4)->article->path() }}">
									<h6 class="card-title mb-2 two-line-clamp l-height-1"><strong>{{ $highlights->get(4)->article->title }}</strong></h6>
								</a>
								<small class="d-block">{{ $highlights->get(4)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(4)->article->reading_time }} min read</small>
							</div>
						</div>
						<hr class="my-2">
						<div class="card px-2 h-auto">
							<div class="card-block">
								<a class="text-default" href="{{ $highlights->get(5)->article->path() }}">
									<h6 class="card-title mb-2 two-line-clamp l-height-1"><strong>{{ $highlights->get(5)->article->title }}</strong></h6>
								</a>
								<small class="d-block">{{ $highlights->get(5)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(5)->article->reading_time }} min read</small>
							</div>
						</div>	
						<hr class="my-2">
						<div class="card px-2 h-auto">
							<div class="card-block">
								<a class="text-default" href="{{ $highlights->get(6)->article->path() }}">
									<h6 class="card-title mb-2 two-line-clamp l-height-1"><strong>{{ $highlights->get(6)->article->title }}</strong></h6>
								</a>
								<small class="d-block">{{ $highlights->get(6)->article->created_at->toFormattedDateString() }} | {{ $highlights->get(6)->article->reading_time }} min read</small>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
				<div id="app-container" class="box row align-items-center justify-space-around jumbotron m-1 text-center">
					<h5 class="mb-2 mx-auto"><strong>TheScienceBreaker <span class="text-orange">APP</span></strong></h5>
					<div class="col-lg-6 col-md-12 mt-2 hidden-sm-down">
						<img src="{{ asset('images/ios-app/app.svg') }}">
					</div>
					<div class="p-2 col-lg-6 col-md-12">
						<p>Our iOS app is coming out soon, <strong>stay tuned</strong>!</p>
						<a href="https://www.facebook.com/sciencebreaker/?fref=ts" target="_blank">
							<img id="apple-store" src="{{ asset('images/ios-app/apple-store.svg') }}">
						</a>
					</div>
				</div>		
			</div>

			<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
				<div id="breaks-list">
					@component('snippets.title')
					Latest published Breaks
					@endcomponent
					<div class="mb-2">
						@foreach ($latest_articles as $suggestion)
							@include('snippets/breaks_grid/rows_sm')
						@endforeach
					</div>				
				</div>
			</div>
		</div>
		<div class="row mt-4 no-gutters">
			<div class="col-lg-12">
				@component('snippets.title')
				Most Popular
				@endcomponent
			</div>
			@foreach ($popular as $article)
				@include('snippets/breaks_grid/columns')
			@endforeach	
		</div>
		{{-- BY SUBJECT --}}
		<div id="by-subject" class="row mt-3">
			<div class="col-12">
				@component('snippets.title')
				Breaks by category
				@endcomponent
			</div>
			<div class="d-flex flex-row justify-content-center align-items-center flex-wrap" id="subject-icons">
				@foreach ($categories as $category)
				<a href="{{ $category->path() }}">
					<div class="icon-wrapper">
						<img src="{{ $category->iconPath() }}">
						<div class="d-flex align-items-center justify-content-center flex-column text-center">
							<h5><strong>{{ $category->name }}</strong></h5>
							<h5><strong>{{ $category->articles_count }} Breaks</strong></h5>
						</div>
					</div>
				</a>
				@endforeach
			</div>
		</div>

		{{-- DISCUSSION --}}
		<div class="row mt-5" id="discussion-container">
			<div class="col-7">
				@component('snippets.title')
				Join the discussion!
				@endcomponent
				<p>TheScienceBreaker is an open-access environment where everyone, scientists and laypeople, can meet and discuss about the latest scientific discoveries. For each and every Break, you may join the discussion-space below each published Break and help us build a better future with more dialogues and less walls!</p>
			</div>
			<div class="col-4 offset-1">
				<i class="fa fa-comments-o" aria-hidden="true"></i>
			</div>
		</div>

		@endsection
