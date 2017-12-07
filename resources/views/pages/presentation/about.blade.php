@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('components/snippets/title')
			{{__('menu.presentation.about')}}
			@endcomponent
			<div class="highlight">
				{!! __('about.highlight') !!}
			</div>
			<p>{!! __('about.p1') !!}</p>
			<div class="jumbotron">
				{!! __('about.p2') !!}
			</div>
			<p>{!! __('about.p3') !!}</p>
		</div>
		
		{{-- Side Bar: Suggestion --}}
		@include('components/partials/side_bars/suggestions')

	</div>
</div>

@endsection
