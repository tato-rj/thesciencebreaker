@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			@component('snippets.title')
			Frequently Asked Questions
			@endcomponent
			<p><strong>Q: What is a Break?</strong></p>
			<p>A Break is a short lay summary, where scientific papers are explained by scientists, called Breakers, directly involved in the field of research.</p>
			<p><strong>Q: Who is a Breaker?</strong></p>
			<p>A Breaker is the author of a Break and to be eligible has to be an active scientist working within the academia or for a non-profit research institute</p>
			<p><strong>Q: Which costs are associated with TheScienceBreaker publishing process?</strong></p>
			<p>No costs are associated. If eligible for publication, the Break will be Open Access published on http://thesciencebreaker.com under the <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank">Creative Commons BY-NC-ND 4.0 licenses</a>.</p>
			<p><strong>Q: Who is working behind TheScienceBreaker?</strong></p>
			<p>TheScienceBreaker editorial board and core team are composed by professional communication officers of the University of Geneva and PhD students from the International PhD Program in Life Sciences from the University of Geneva. <a href="https://www.bioutils.ch/" target="_blank">BiOutils</a>, Science communication platform from the University of Geneva is partner with TheScienceBreaker and is hosting its headquarters.</p>
			<p><strong>Q: Is there a specific topic you wish me to Break about?</strong></p>
			<p>There are two possibilities:</p>
			<div class="jumbotron">
				<ol>
					<li>There is an interesting article (published by you or by one of your peers) that you wish to report to the broad public.</li>
					<li>The list of Break requests that we receive from the Broad public is listed in the <a href="/available-articles">Available Articles</a> page</li>
				</ol>
			</div>
			<p><strong>Q: How complete is the paper review meant to be?</strong></p>
			<p>A Break will be complete if it</p>
			<div class="jumbotron">
				<ol>
					<li>a brief description of the <u>scientific context</u> of the pursued research;</li>
					<li>a summary of the main <u>scientific questions</u> that drove the research;</li>
					<li>an interpretation of the <u>results and their implications</u>;</li>
					<li>a <u>general comment</u> on the paper.</li>
				</ol>
			</div>
			<p><strong>Q: Will it be possible to post references useful for the Reader?</strong></p>
			<p>Yes, you can include references in your Break (author, date). If you then send us the complete reference (author/date/title), we’ll link it embedded on the -author, date- of the paper/reference when we’ll post it on the Breaks page.</p>
			<p><strong>Q: Is it possible to provide links within the text so that the Reader can quickly cross-reference stuff or get quick definitions?</strong></p>
			<p>Sure! Just send us the link (e.g. to a Wikipedia article, a special website or forum etc.) and we’ll add it to the Break, embedded in the text.</p>
			<p><strong>Q: Which is the target audience?</strong></p>
			<p>Our readership ideally consists of scientists from very different areas and, above all, laypeople. Keep in mind that most of the audience will be not acquainted with scientific terms and “jargonic” expressions. Therefore, the pitch of the Break must be tuned accordingly.</p>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
