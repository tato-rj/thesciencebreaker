@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-12">
			@component('components/snippets/title')
			{{__('menu.for_breakers.revops')}}
			@endcomponent

			<p class="lead mt-4">{!!__('revops.precheck.title')!!}</p>
			<p>{!!__('revops.precheck.p1')!!}</p>

			<p class="lead mt-4">{!!__('revops.revop.title')!!}</p>
			<p>{!!__('revops.revop.p1')!!}</p>
			<div class="jumbotron">
				<p>{!!__('revops.revop.p2')!!}</p>			
			</div>
			<p>{!!__('revops.revop.p3')!!}</p>

			<p class="lead mt-4">{!!__('revops.final.title')!!}</p>
			<p>{!!__('revops.final.p1')!!}</p>
			<p>{!!__('revops.final.p2')!!}</p>
			<p>{!!__('revops.final.p3')!!}</p>

			<p class="lead mt-4">{!!__('revops.features.title')!!}</p>
			<div class="jumbotron">
				<ul>
					<li>{!!__('revops.features.p1')!!}</li>
					<li>{!!__('revops.features.p2')!!}</li>
					<li>{!!__('revops.features.p3')!!}</li>
					<li>{!!__('revops.features.p4')!!}</li>
					<li>{!!__('revops.features.p5')!!}</li>
				</ul>
			</div>

			<div class="text-center mt-5">
				@component('components/snippets/buttons/brand')
					{{__('menu.contact.question')}}
					@slot('url')
					/contact/ask-a-question
					@endslot
				@endcomponent
			</div>
		</div>
		
		{{-- Side Bar: Suggestion --}}
		@include('components/partials/side_bars/suggestions')

	</div>
</div>

@endsection
