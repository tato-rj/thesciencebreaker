@extends('_core')

@section('content')

<div class="container">
	{{-- INTRO --}}
	<div class="row mt-5">
		<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 mb-4">
			<div class="box">
				@component('snippets.title')
				Why TheScienceBreaker?
				@endcomponent
				<p>TheScienceBreaker promotes the dialogue and the dissemination of a scientific culture so that society-relevant opinions can be discussed and decisions may be taken accordingly. Discover our <a href="/mission">mission</a>.</p>
			</div>
			<div class="box">
				@component('snippets.title')
				What is a Break?
				@endcomponent
				<p>We publish short lay summaries, called Breaks, where scientific papers are explained by scientists, called Breakers, directly involved in the field of research. <a href="/about">Learn more</a></p>
			</div>
			<div id="app-container" class="box row align-items-center justify-space-around jumbotron m-1 text-center">
			
				<h5 class="mb-2 mx-auto"><strong>TheScienceBreaker <span class="text-orange">APP</span></strong></h5>
		
				<div class="col-lg-6 col-md-12 mt-2 hidden-sm-down">
					<img src="{{ asset('images/ios-app/app.svg') }}">
				</div>
				<div class="p-2 col-lg-6 col-md-12">
					<p>Our iOS app is coming up soon, <strong>stay tuned</strong>!</p>
					<a href="https://www.facebook.com/sciencebreaker/?fref=ts" target="_blank">
						<img id="apple-store" src="{{ asset('images/ios-app/apple-store.svg') }}">
					</a>
				</div>
			</div>		
		</div>

		<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
			<div class="box">
				<div class="d-flex align-items-baseline justify-content-between">
					<h4>Latest published Breaks</h4>
					<span class="text-muted"><small>Today, {{ Carbon\Carbon::now()->toFormattedDateString() }}</small></span>
				</div>
				<div class="box">
					<table id="latest-breaks">
						@foreach ($latest_articles as $break)
							<tr>
								<th>
									<img src="{{ $break->category->iconPath() }}">
								</th>
								<td>
									<p>
										<a href="{{ $break->path() }}">{{ $break->title }}</a>
									</p>
									<p><small><strong>Written by: 
										@foreach ($break->authors as $author)
										{{ $loop->first ? '' : ', ' }}
										{{ $author->fullName() }}
										@endforeach
									</strong></small></p>
									<p><small>Published {{ $break->created_at->diffForHumans() }} in <a href="{{ $break->category->path() }}">{{ $break->category->name }}</a></small></p>
								</td>
							</tr>					
						@endforeach
					</table>
				</div>				
			</div>
			<div class="box">
				<div class="d-flex align-items-baseline justify-content-between">
					<h4>Most popular</h4>
				</div>
				<div>
					<table id="latest-breaks">
						@foreach ($popular as $break)
							<tr>
								<th>
									<img src="{{ $break->category->iconPath() }}">
								</th>
								<td>
									<p>
										<a href="{{ $break->path() }}">{{ $break->title }}</a>
									</p>
									<p><small><strong>Written by: 
										@foreach ($break->authors as $author)
										{{ $loop->first ? '' : ', ' }}
										{{ $author->fullName() }}
										@endforeach
									</strong></small></p>
									<p><small>Published {{ $break->created_at->diffForHumans() }} in <a href="{{ $break->category->path() }}">{{ $break->category->name }}</a></small></p>
								</td>
							</tr>					
						@endforeach
					</table>
				</div>				
			</div>
		</div>
	</div>

	{{-- BY SUBJECT --}}
	<div class="row mt-3">
		<div class="col-12">
				@component('snippets.title')
				Breaks by subject
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

	{{-- APP --}}
{{-- 	<div class="row mt-5">
		<div class="d-flex col-12 justify-content-center align-items-center" id="app-container">
			<div>
				<img src="/images/ios-app/iphone.svg">
			</div>
			<div class="text-center">
				<h4>Check out our new</h4>
				<h3 class="text-orange"><strong>Mobile App!</strong></h3>
				<img src="/images/ios-app/apple-store.svg" class="mt-2" id="apple-store-icon">
			</div>	
		</div>
	</div> --}}

	{{-- DISCUSSION --}}
	<div class="row hidden-sm-down mt-5" id="discussion-container">
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