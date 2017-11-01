@extends('_core')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			@component('snippets.title')
			Information for Authors
			@endcomponent
			<div class="highlight">
				<strong>IMPORTANT:</strong> to be entitled to authorship a Break, you must be a scientist actively pursuing your research within an academic research institution.
			</div>
			<p>A Break is a summary of a published scientific article. In general, the submitted manuscript should report:</p>
			<div class="jumbotron">
				<ol>
					<li>brief description of the scientific context of the pursued research;</li>
					<li>a summary of the main scientific questions that drove the research;</li>
					<li>an interpretation of the results and their implications;</li>
					<li>a general comment on the paper.</li>
				</ol>
			</div>
			<p>However, a Break should be more than a simple summary. The purpose of a Break is to make a (complicated) scientific finding accessible to a broader audience. Our readership ideally consists of scientists from very different areas and, above all, laypeople. It is, thus, important to address those who do not have any knowledge of your background, and give them a fascinating story that inspires them to ask questions and get to know more.</p>
			<p>While drafting your manuscript, please do keep in mind the following aspects:</p>
			<div class="jumbotron">
				<ul>
					<li>Keep it <strong>short</strong> (~ 700 words)</li>
					<li>Have an interesting, <strong>catchy title</strong></li>
					<li><strong>First sentence</strong> let the audience know why this research is important</li>
					<li>Spell out its <strong>relevance and impact</strong> - not only the impact for the scientific community but why your <strong>non-scientist</strong> friend should care</li>
					<li>Structure it <strong>with short sentences and paragraphs</strong></li>
					<li><strong>Don't use any scientific jargon</strong>, try to use simple (every-day) words and phrases</li>
					<li><strong>Focus on the results</strong> that are interesting for the reader, <strong>not on how the researchers got there</strong>. Detailed descriptions of methods and experimental setups only distract from the message</li>
					<li><strong>Leave out details</strong>, numbers, and irrelevant facts</li>
					<li><strong>Cap things off</strong> at the end so a non-expert comes away with a strong, simple <strong>take-home message</strong>.</li>
				</ul>
			</div>
			<p>Read more on the <a href="/faq">F.A.Q. for Breakers</a>.</p>
			<div class="text-center mt-5">
				<a href="/contact/submit-your-break" class="btn bg-default text-white" id="breaker-btn"><img src="/images/logo-small.svg"><strong>SUBMIT YOUR BREAK</strong></a>
			</div>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection