@extends('app')

@section('content')

<div id="overlay">
	<img src="{{ asset('images/logo-small.svg') }}">
</div>

<div class="container">
	
	{{--
	/==========================================================================
	/	INTRO
	/==========================================================================
	/
	/	Box describing the project, its name and mission.
	/
	--}}

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
	
	{{--
	/==========================================================================
	/	MAIN GRID
	/==========================================================================
	/
	/	Grid containing highlighted braks.
	/
	--}}

	<div class="row no-gutters mt-4">
		<div class="col-lg-12">
			@component('components/snippets/title')
			Highlights
			@endcomponent
		</div>
		@include('components/partials/grids/highlights')
	</div>
	
	{{--
	/==========================================================================
	/	APP AND LATEST BREAKS
	/==========================================================================
	/
	/	Box advertising the app and a list of the latest published breaks.
	/
	--}}

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
				@component('components/snippets/title')
				Latest published Breaks
				@endcomponent
				<div class="mb-2">
					@foreach ($latest_articles as $suggestion)
						@include('components/partials/grids/rows')
					@endforeach
				</div>				
			</div>
		</div>
	</div>
	
	{{--
	/==========================================================================
	/	GRID COLUMN
	/==========================================================================
	/
	/	Grid containing the most visited breaks.
	/
	--}}

	<div class="row mt-4 no-gutters">
		<div class="col-lg-12">
			@component('components/snippets/title')
			Most Popular
			@endcomponent
		</div>
		@foreach ($popular as $article)
			@include('components/partials/grids/columns')
		@endforeach	
	</div>
	
	{{--
	/==========================================================================
	/	CATEGORIES DISPLAY
	/==========================================================================
	/
	/	All category icons displaying the number of breaks in each.
	/
	--}}

	<div id="by-subject" class="row mt-3">
		<div class="col-12">
			@component('components/snippets/title')
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
	
	{{--
	/==========================================================================
	/	DISQUS
	/==========================================================================
	/
	/	Section encouraging visitors to engage in the DISQUS discussions. 
	/	(This needs improvement)
	/
	--}}

	<div class="row mt-5" id="discussion-container">
		<div class="col-7">
			@component('components/snippets/title')
			Join the discussion!
			@endcomponent
			<p>TheScienceBreaker is an open-access environment where everyone, scientists and laypeople, can meet and discuss about the latest scientific discoveries. For each and every Break, you may join the discussion-space below each published Break and help us build a better future with more dialogues and less walls!</p>
		</div>
		<div class="col-4 offset-1">
			<i class="fa fa-comments-o" aria-hidden="true"></i>
		</div>
	</div>

</div>
@endsection
