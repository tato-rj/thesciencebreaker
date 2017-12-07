@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('components/snippets/title')
			{{__('menu.presentation.mission')}}
			@endcomponent
			<p>{{__('mission.p1')}}</p>
			<div class="highlight">
				{{__('mission.highlight')}}
			</div>
			<p>{{__('mission.p2')}}</p>
			<div class="text-center mt-5">
				@component('components/snippets/buttons/brand')
					{{__('mission.button')}}
					@slot('url')
					/information
					@endslot
				@endcomponent
			</div>
		</div>

		{{-- Side Bar: Suggestion --}}
		@include('components/partials/side_bars/suggestions')

	</div>
</div>

@endsection
