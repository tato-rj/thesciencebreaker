@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('snippets.title')
			About
			@endcomponent
			<div class="highlight">
				TheScienceBreaker project has been launched in <strong>January 2015</strong>. Since then it has been committed to one mission, namely engage the public with science and technology through the democratization of scientific literature.
			</div>
			<p>At TheScienceBreaker, PhD students, postDocs, lecturers, professors and every researcher working in the academic environment (the Breakers) can comment, explain and discuss scientific articles taken from different scientific fields. To do so, the Breaker writes a lay summary (the Break) of the selected publication, which can then be used as an input to dialogue with the broad public about the latest scientific developments. Importantly, the laypeople will be empowered of the possibility to propose articles for Break-drafting and, by participating to the discussions, they will help scientists to explore and learn from the world outside of their ivory tower.</p>
			<div class="jumbotron">
				In summary, the scientific article “to be Breaked” can be either chosen by the Breaker or proposed by the broad public. In the first case, the Breaker can spontaneously submit a Break through the <a href="/contact/submit-your-break">Submit your Break</a> page. In the latter case anyone interested in a specific topic (for example a recent discovery mentioned in the press) can request a Break through the dedicated <a href="/contact/ask-a-question">Ask for a Break</a> page.
			</div>
			<p>Importantly, at TheScienceBreaker, we believe that the dialogue between scientists and citizens will promote the public engagement with science and technology. To achieve this, the discussions originated by our published material should fuel curiosity and generate understanding, not rage nor fears. Join our imzy-community, share your point of view and contribute to the discussion!</p>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
