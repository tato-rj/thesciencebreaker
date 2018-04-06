@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12" id="partners">
			@component('components/snippets/title')
			{{__('menu.presentation.partners')}}
			@endcomponent
			<div class="d-flex flex-row justify-content-center align-items-center flex-wrap mt-4">
				<a href="http://antibiotic-action.com/" target="_blank">
					<img class="bw" src="{{ asset('images/partners/antibiotic.svg') }}">
				</a>
				<a href="https://www.bioutils.ch/" target="_blank">
					<img class="bw" src="{{ asset('images/partners/bioutils.svg') }}">
				</a>
				<a href="https://www.leftlaneapps.com" target="_blank">
					<img class="bw" src="{{ asset('images/partners/leftlane.svg') }}">
				</a>
				<a href="http://www.unige.ch/" target="_blank">
					<img class="bw" src="{{ asset('images/partners/university.svg') }}">
				</a>
			</div>
		</div>

		{{-- Side Bar: Suggestion --}}
		@include('components/partials/side_bars/suggestions')

	</div>
</div>

@endsection
