@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-12">
			@component('components/snippets/title')
			{{__('menu.for_breakers.guidelines')}}
			@endcomponent

			<p>{!!__('guidelines.p1')!!}</p>
			<p>{!!__('guidelines.p2')!!}</p>

			<p class="lead mt-5">{!!__('guidelines.consider.title')!!}</p>
			<div class="jumbotron">
				<ul>
					<li>{!!__('guidelines.consider.p1')!!}</li>
					<li>{!!__('guidelines.consider.p2')!!}</li>
					<li>{!!__('guidelines.consider.p3')!!}</li>
					<li>{!!__('guidelines.consider.p4')!!}</li>
					<li>{!!__('guidelines.consider.p5')!!}</li>
					<li>{!!__('guidelines.consider.p6')!!}</li>
					<li>{!!__('guidelines.consider.p7')!!}</li>
				</ul>
			</div>

			<p class="lead mt-5">{!!__('guidelines.tips.title')!!}</p>
			<div class="jumbotron">
				<ol>
					<li>{!!__('guidelines.tips.list.li1')!!}</li>
					<li>{!!__('guidelines.tips.list.li2')!!}</li>
					<li>{!!__('guidelines.tips.list.li3')!!}</li>
					<li>{!!__('guidelines.tips.list.li4')!!}</li>
					<li>{!!__('guidelines.tips.list.li5')!!}</li>
					<li>{!!__('guidelines.tips.list.li6')!!}</li>
					<li>{!!__('guidelines.tips.list.li7')!!}</li>
				</ol>
			</div>

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
