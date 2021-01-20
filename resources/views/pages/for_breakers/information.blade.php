@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-12">
			@component('components/snippets/title')
			{{__('menu.for_breakers.information')}}
			@endcomponent

			<p class="lead mt-4">{!!__('information.purpose.title')!!}</p>
			<p>{!!__('information.purpose.p1')!!}</p>

			<p class="lead mt-5">{!!__('information.authorship.title')!!}</p>
			<p>{!!__('information.authorship.p1')!!}</p>

			<p class="lead mt-5">{!!__('information.plagiarism.title')!!}</p>
			<p>{!!__('information.plagiarism.p1')!!}</p>

			<p class="lead mt-5">{!!__('information.format.title')!!}</p>
			<div class="jumbotron">
				<p>{!!__('information.format.headline')!!}</p>
				<ul>
					<li>{!!__('information.format.p1')!!}</li>
					<li>{!!__('information.format.p2')!!}</li>
					<li>{!!__('information.format.p3')!!}</li>
				</ul>
			</div>

			<p class="lead mt-5">{!!__('information.features.title')!!}</p>
			<div class="jumbotron">
				<ol>
					<li>{!!__('information.features.list.li1')!!}</li>
					<li>{!!__('information.features.list.li2')!!}</li>
					<li>{!!__('information.features.list.li3')!!}</li>
					<li>{!!__('information.features.list.li4')!!}</li>
					<li>{!!__('information.features.list.li5')!!}</li>
				</ol>
			</div>

			<p>{!!__('information.more')!!}</p>

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
