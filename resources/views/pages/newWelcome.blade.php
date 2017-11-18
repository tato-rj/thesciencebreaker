@extends('_core')

@section('content')

<div id="overlay">
	<img src="{{ asset('images/logo-small.svg') }}">
</div>

<div class="container">
	{{-- INTRO --}}
	<div class="row mt-4 jumbotron mb-2">
		<div class="col-lg-6">
			<div class="mb-2">
				<h4 class="text-orange">Why TheScienceBreaker?</h4>
				<p class="mb-0">TheScienceBreaker promotes the dialogue and the dissemination of a scientific culture so that society-relevant opinions can be discussed and decisions may be taken accordingly. Discover our <a href="/mission">mission</a>.</p>
			</div>			
		</div>
		<div class="col-lg-6">
			<div class="mb-2">
				<h4 class="text-orange">What is a Break?</h4>
				<p class="mb-0">We publish short lay summaries, called Breaks, where scientific papers are explained by scientists, called Breakers, directly involved in the field of research. <a href="/about">Learn more</a></p>
			</div>			
		</div>
	</div>
	<div class="row no-gutters mt-3">
		<div class="col-lg-12">
			@component('snippets.title')
			Highlights
			@endcomponent
		</div>
		<div class="col-lg-6 col-md-12">
			<div class="card px-2">
				<div class="card-image">
					<a href="{{ $highlights->get(0)->category->path() }}">
						<span class="badge badge-info btn-theme-green">in {{ $highlights->get(0)->category->name }}</span>
					</a>
					<a href="{{ $highlights->get(0)->path() }}">
						<img class="card-img-top round-corners" src="{{ asset($highlights->get(0)->image()) }}">
					</a>
				</div>
				<div class="card-block px-2 py-3">
					<a class="text-default" href="{{ $highlights->get(0)->path() }}">
						<h4 class="card-title mb-2"><strong>{{ $highlights->get(0)->title }}</strong></h4>
					</a>
					<p class="card-text text-muted mb-2 l-height-1">{{ $highlights->get(0)->description }}</p>
					<small class="d-block">published on {{ $highlights->get(0)->created_at->toFormattedDateString() }}</small>
					<small>by 
						@foreach ($highlights->get(0)->authors as $author)
						{{ $loop->first ? '' : ', ' }}
						<a href="{{ $author->path() }}">{{ $author->fullName() }}</a>
						@endforeach
						| {{ $highlights->get(0)->reading_time }} min read</small>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-6 col-xs-12">
						<div class="card px-2">
							<div class="card-image">
								<a href="{{ $highlights->get(1)->category->path() }}">
									<span class="badge badge-info btn-theme-green">in {{ $highlights->get(1)->category->name }}</span>
								</a>
								<a href="{{ $highlights->get(1)->path() }}">
									<img class="card-img-top round-corners" src="{{ asset($highlights->get(1)->image()) }}">
								</a>
							</div>
							<div class="card-block px-2 py-3">
								<a class="text-default" href="{{ $highlights->get(1)->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(1)->title }}</strong></h6>
								</a>
								<p class="card-text text-muted mb-2 l-height-1 two-line-clamp">{{ $highlights->get(1)->description }}</p>
								<small class="d-block">{{ $highlights->get(1)->created_at->toFormattedDateString() }} | {{ $highlights->get(1)->reading_time }} min read</small>
							</div>
						</div>					
					</div>
					<div class="col-lg-6 col-md-6 col-xs-12">
						<div class="card px-2">
							<div class="card-image">
								<a href="{{ $highlights->get(2)->category->path() }}">
									<span class="badge badge-info btn-theme-green">in {{ $highlights->get(2)->category->name }}</span>
								</a>
								<a href="{{ $highlights->get(2)->path() }}">
									<img class="card-img-top round-corners" src="{{ asset($highlights->get(2)->image()) }}">
								</a>
							</div>
							<div class="card-block px-2 py-3">
								<a class="text-default" href="{{ $highlights->get(2)->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(2)->title }}</strong></h6>
								</a>
								<p class="card-text text-muted mb-2 l-height-1 two-line-clamp">{{ $highlights->get(2)->description }}</p>
								<small class="d-block">{{ $highlights->get(2)->created_at->toFormattedDateString() }} | {{ $highlights->get(2)->reading_time }} min read</small>
							</div>
						</div>	
					</div>
				</div>
				<div class="row no-gutters">
					<div class="col-lg-5 hidden-md-down">
						<div class="card px-2">
							<div class="card-image">
								<a href="{{ $highlights->get(3)->category->path() }}">
									<span class="badge badge-info btn-theme-green">in {{ $highlights->get(3)->category->name }}</span>
								</a>
								<a href="{{ $highlights->get(3)->path() }}">
									<img class="card-img-top round-corners" src="{{ asset($highlights->get(3)->image()) }}">
								</a>
							</div>
							<div class="card-block px-2 py-3">
								<a class="text-default" href="{{ $highlights->get(3)->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(3)->title }}</strong></h6>
								</a>
								<p class="card-text text-muted mb-2 l-height-1 one-line-clamp">{{ $highlights->get(3)->description }}</p>
								<small class="d-block">{{ $highlights->get(3)->created_at->toFormattedDateString() }} | {{ $highlights->get(3)->reading_time }} min read</small>
							</div>
						</div>							
					</div>
					<div class="col-lg-7 col-md-12">
						<div class="card px-2 h-auto">
							<div class="card-block">
								<a class="text-default" href="{{ $highlights->get(4)->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(4)->title }}</strong></h6>
								</a>
								<small class="d-block">{{ $highlights->get(4)->created_at->toFormattedDateString() }} | {{ $highlights->get(4)->reading_time }} min read</small>
							</div>
						</div>
						<hr class="my-2">
						<div class="card px-2 h-auto">
							<div class="card-block">
								<a class="text-default" href="{{ $highlights->get(5)->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(5)->title }}</strong></h6>
								</a>
								<small class="d-block">{{ $highlights->get(5)->created_at->toFormattedDateString() }} | {{ $highlights->get(5)->reading_time }} min read</small>
							</div>
						</div>	
						<hr class="my-2">
						<div class="card px-2 h-auto">
							<div class="card-block">
								<a class="text-default" href="{{ $highlights->get(6)->path() }}">
									<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $highlights->get(6)->title }}</strong></h6>
								</a>
								<small class="d-block">{{ $highlights->get(6)->created_at->toFormattedDateString() }} | {{ $highlights->get(6)->reading_time }} min read</small>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 mb-4">
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
				<div id="breaks-list" class="mb-2">
					<div class="title d-flex align-items-baseline justify-content-between">
						<h4>Latest published Breaks</h4>
						<span class="text-muted"><small>Today, {{ Carbon\Carbon::now()->toFormattedDateString() }}</small></span>
					</div>
					<div class="mb-2">
						<table id="latest-breaks">
							@foreach ($latest_articles as $break)
							<tr>
								<th>
									<img src="{{ $break->category->iconPath() }}">
								</th>
								<td>
									<h6 class="mb-0">
										<a class="text-default" href="{{ $break->path() }}">{{ $break->title }}</a>
									</h6>
									<p><small>by  
										@foreach ($break->authors as $author)
										{{ $loop->first ? '' : ', ' }}
										<a href="{{ $author->path() }}">{{ $author->fullName() }}</a>
										@endforeach
									</small></p>
									<p><small>Published {{ $break->created_at->diffForHumans() }} in <strong><a class="text-default" href="{{ $break->category->path() }}">{{ $break->category->name }}</a></strong></small></p>
								</td>
							</tr>					
							@endforeach
						</table>
					</div>				
				</div>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-lg-12">
				@component('snippets.title')
				Most Popular
				@endcomponent
			</div>
			@foreach ($popular as $break)
			<div class="col-lg-4">
				<div class="card px-2 breaks-main-grid">
					<div class="card-image round-corners">
						<a href="{{ $break->category->path() }}">
							<span class="badge badge-info btn-theme-green">in {{ $break->category->name }}</span>
						</a>
						<a href="{{ $break->path() }}">
							<img class="card-img-top round-corners" src="{{ asset($break->image()) }}">
						</a>
					</div>
					<div class="card-block px-2 py-3">
						<a class="text-default" href="{{ $break->path() }}">
							<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $break->title }}</strong></h6>
						</a>
						<p class="card-text text-muted mb-2 l-height-1 two-line-clamp">{{ $break->description }}</p>
						<small class="d-block">{{ $break->created_at->toFormattedDateString() }} | {{ $break->reading_time }} min read</small>
					</div>
				</div>						
			</div>
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
