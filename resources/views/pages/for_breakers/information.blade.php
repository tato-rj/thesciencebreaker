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

			<p class="lead mt-5">{!!__('information.drafting.title')!!}</p>
			<div class="jumbotron">
				<ul>
					<li>{!!__('information.drafting.p1')!!}</li>
					<li>{!!__('information.drafting.p2')!!}</li>
					<li>{!!__('information.drafting.p3')!!}</li>
					<li>{!!__('information.drafting.p4')!!}</li>
					<li>{!!__('information.drafting.p5')!!}</li>
					<li>{!!__('information.drafting.p6')!!}</li>
					<li>{!!__('information.drafting.p7')!!}</li>
					<li>{!!__('information.drafting.p8')!!}</li>
				</ul>
			</div>

			<p class="lead mt-5">{!!__('information.tips.title')!!}</p>
			<div class="jumbotron">
				<ol>
					<li>{!!__('information.tips.list.li1')!!}</li>
					<li>{!!__('information.tips.list.li2')!!}</li>
					<li>{!!__('information.tips.list.li3')!!}</li>
					<li>{!!__('information.tips.list.li4')!!}</li>
					<li>{!!__('information.tips.list.li5')!!}</li>
					<li>{!!__('information.tips.list.li6')!!}</li>
					<li>{!!__('information.tips.list.li7')!!}</li>
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
