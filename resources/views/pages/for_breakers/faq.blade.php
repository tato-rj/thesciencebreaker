@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-12">
			@component('components/snippets/title')
			{{__('menu.for_breakers.faq')}}
			@endcomponent
			<p><strong class="faq-question">{{__('faq.q1')}}</strong></p>
			<p>{!!__('faq.p1')!!}</p>
			<p><strong class="faq-question">{{__('faq.q2')}}</strong></p>
			<p>{!!__('faq.p2')!!}</p>
			<p><strong class="faq-question">{{__('faq.q3')}}</strong></p>
			<p>{!!__('faq.p3')!!}</p>
			<p><strong class="faq-question">{{__('faq.q4')}}</strong></p>
			<p>{!!__('faq.p4')!!}</p>
			<p><strong class="faq-question">{{__('faq.q5')}}</strong></p>
			<p>{!!__('faq.p5')!!}</p>
			<div class="jumbotron">
				<ol>
					{!!__('faq.ol1')!!}
				</ol>
			</div>
			<p><strong class="faq-question">{{__('faq.q6')}}</strong></p>
			<p>{!!__('faq.p6')!!}</p>
			<div class="jumbotron">
				<ol>
					{!!__('faq.ol2')!!}
				</ol>
			</div>
			<p><strong class="faq-question">{{__('faq.q7')}}</strong></p>
			<p>{!!__('faq.p7')!!}</p>
			<p><strong class="faq-question">{{__('faq.q8')}}</strong></p>
			<p>{!!__('faq.p8')!!}</p>
			<p><strong class="faq-question">{{__('faq.q9')}}</strong></p>
			<p>{!!__('faq.p9')!!}</p>
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
