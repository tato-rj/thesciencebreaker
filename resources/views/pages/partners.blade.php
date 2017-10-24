@extends('_core')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" id="partners">
			@component('snippets.title')
			Partners
			@endcomponent
			<div class="d-flex flex-row justify-content-center align-items-center flex-wrap mt-4">
				<a href="">
					<img class="bw" src="{{ asset('images/partners/antibiotic.svg') }}">
				</a>
				<a href="">
					<img class="bw" src="{{ asset('images/partners/bioutils.svg') }}">
				</a>
				<a href="">
					<img class="bw" src="{{ asset('images/partners/leftlane.svg') }}">
				</a>
				<a href="">
					<img class="bw" src="{{ asset('images/partners/university.svg') }}">
				</a>
			</div>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
