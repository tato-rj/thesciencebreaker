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
				<h4>{!! __('welcome.description.why-title') !!}</h4>
				<p class="mb-0">{!! __('welcome.description.why-text') !!}</p>
			</div>			
		</div>
		<div class="col-lg-6">
			<div class="mb-2">
				<h4>{!! __('welcome.description.what-title') !!}</h4>
				<p class="mb-0">{!! __('welcome.description.what-text') !!}</p>
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
			{{__('global.latest')}}
			@endcomponent
		</div>
	</div>

	@include('components/partials/grids/highlights')

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
			@component('components/snippets/title')
				TheScienceBreaker <span class="text-orange">APP</span>
			@endcomponent
			<div id="app-container" class="row align-items-center justify-space-around text-center mb-4">
				<div class="col-lg-6 col-md-12 mt-2 hidden-sm-down">
					<img src="{{ asset('images/ios-app/mobile_app.png') }}">
				</div>
				<div class="p-2 col-lg-6 col-md-12">
					<p>{!!__('welcome.app')!!}</p>
					<a href="https://itunes.apple.com/app/id1227263216" target="_blank">
						<img id="apple-store" src="{{ asset('images/ios-app/download.svg') }}">
					</a>
				</div>
			</div>		
		</div>
		<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
			<div id="breaks-list">
				@component('components/snippets/title')
				{{__('welcome.highlights')}}
				@endcomponent
				<div class="mb-2">
					@foreach ($highlights->pluck('article') as $suggestion)
						@if($suggestion)
							@include('components/partials/grids/rows')
						@endif
					@endforeach
				</div>				
			</div>
		</div>
	</div>
	
	{{--
	/==========================================================================
	/	PARTNERS DISPLAY
	/==========================================================================
	--}}

	<div class="row mt-4">
		<div class="col-12" id="partners">
			@component('components/snippets/title')
			{{__('welcome.partners')}}
			@endcomponent
			<div class="d-flex flex-row justify-content-center align-items-center flex-wrap mt-4">
				<a href="https://toplink.weforum.org/knowledge/explore" target="_blank">
					<img class="bw" style="width: 120px" src="{{ asset('images/partners/forum.svg') }}">
				</a>
				<a href="https://altmetric.com/" target="_blank">
					<img class="bw" style="width: 120px" src="{{ asset('images/partners/altmetric.svg') }}">
				</a>
{{-- 				<a href="http://antibiotic-action.com/" target="_blank">
					<img class="bw" style="width: 120px" src="{{ asset('images/partners/antibiotic.svg') }}">
				</a> --}}
{{-- 				<a href="https://www.bioutils.ch/" target="_blank">
					<img class="bw" style="width: 120px" src="{{ asset('images/partners/bioutils.svg') }}">
				</a> --}}
				<a href="https://www.leftlaneapps.com" target="_blank">
					<img class="bw" style="width: 120px" src="{{ asset('images/partners/leftlane.svg') }}">
				</a>
				<a href="http://www.unige.ch/" target="_blank">
					<img class="bw" style="width: 120px" src="{{ asset('images/partners/university.svg') }}">
				</a>
			</div>
		</div>
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
		<div class="col-lg-8">
			@component('components/snippets/title')
			{{__('welcome.categories')}}
			@endcomponent
			<div class="d-flex flex-row justify-content-center align-items-center flex-wrap" id="subject-icons">
				@foreach ($categories as $category)
				<a href="{{ $category->paths()->route() }}">
					<div class="icon-wrapper">
						<img src="{{ $category->paths()->icon() }}">
						<div class="d-flex align-items-center justify-content-center flex-column text-center">
							<h5><strong>{{__('categories.'.$category->slug)}}</strong></h5>
							<h5><strong>{{ $category->articles()->published()->count() }} Breaks</strong></h5>
						</div>
					</div>
				</a>
				@endforeach
			</div>			
		</div>
		<div class="col-lg-4">
			@component('components/snippets/title')
			{{__('global.topics')}}
			@endcomponent
			<div class="d-flex flex-wrap">
				@foreach ($topics as $topic)
				
					<div class="d-flex tags m-1">
						<a href="{{ $topic->path() }}">
							<span class="badge badge-pill">{{ $topic->name }}</span>
						</a>
					</div>
				
				@endforeach
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
			{{__('global.popular')}}
			@endcomponent
		</div>
		@foreach($popular as $article)
			@include('components/partials/grids/columns')
		@endforeach	
	</div>
</div>
@endsection
