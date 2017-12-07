@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-12">
			@component('components/snippets/title')
			{{__('menu.for_breakers.information')}}
			@endcomponent
			<div class="highlight">
				{!!__('information.highlight')!!}
			</div>
			<p>{!!__('information.p1')!!}</p>
			<div class="jumbotron">
				<ol>
					{!!__('information.ol')!!}
				</ol>
			</div>
			<p>{!!__('information.p2')!!}</p>
			<div class="jumbotron">
				<ul>
					{!!__('information.ul')!!}
				</ul>
			</div>
			<p>{!!__('information.p3')!!}</p>
			<div class="text-center mt-5">
				@component('components/snippets/buttons/brand')
					{{__('menu.contact.submit')}}
					@slot('url')
					/contact/submit-your-break
					@endslot
				@endcomponent
			</div>
		</div>

		{{-- Side Bar: Suggestion --}}
		@include('components/partials/side_bars/suggestions')

	</div>
</div>

@endsection
