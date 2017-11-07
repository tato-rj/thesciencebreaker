			<div class="mt-4 mb-4">
				<h5><a href="{{ $article->path() }}"><i class="fa fa-file-text mr-2" aria-hidden="true"></i><strong>{{ $article->title }}</strong></a></h5>
				<p class="mt-3">{!! html_entity_decode($article->preview()) !!}... <a href="{{ $article->path() }}">click to read more</a></p>
				<ul class="authors">
					@foreach ($article->authors as $author)
					<small><li><strong><a href="{{ $author->path() }}" class="breaker">{{ $author->fullName() }}</a></strong> | {{ $author->position }} at {{ $author->research_institute }}</li></small>
					@endforeach
				</ul>
				@include('partials.reading-time-bar')
			</div>