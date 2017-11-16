<div id="social" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
	<div class="d-flex flex-column justify-content-center" id="side-social">
			@include('snippets.mailto')
			<i class="fa fa-envelope-open" aria-hidden="true"></i>
		</a>
		<a class="cursor-link" id="shareFacebook" title="Share this break on Facebook">
			<i class="fa fa-facebook" aria-hidden="true"></i>
		</a>
		<a id="twitter" class="cursor-link" data-link="https://twitter.com/share?text={{ $article->title }} @sciencebreaker&hashtags=thesciencebreaker
		@foreach ($article->tags as $tag)
		,{{ $tag->name }}
		@endforeach
		">
			<i class="fa fa-twitter" aria-hidden="true"></i>
		</a>
		<a id="google-plus" class="cursor-link" data-link="https://plus.google.com/share?url={{ url()->full() }}">
			<i class="fa fa-google" aria-hidden="true"></i>
		</a>
		@if(File::exists($article->pdf()))
		<a href="{{ asset($article->pdf()) }}" target="_blank">
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		</a>
		@endif
	</div>
</div>
