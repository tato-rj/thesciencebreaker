@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row" id="author">
		<div class="col-lg-9 col-md-12">
			<div class="mt-4 jumbotron">
				<div class="d-flex align-items-baseline">
					<h4><i class="fa fa-user mr-2" aria-hidden="true"></i><strong>{{ $author->fullName() }}</strong></h4>
					<small class="ml-2"><em>joined in {{ $author->created_at->toFormattedDateString() }}</em></small>
				</div>
				<div class="">
					<p class="mb-1">{{ $author->position }} at {{ $author->research_institute }}.</p>
					<p class="mb-0">{{ $author->last_name }} has <strong>{{ $author->articles_count }}</strong> {{str_plural('break', $author->articles_count)}} published.</p>
					@if (!empty($author->general_comments))
						<p class="text-green mt-4 mb-0 text-center "><em>{!! html_entity_decode($author->general_comments) !!}</em></p>
					@endif
				</div>
			</div>
			<div>
				@foreach($author->articles as $article)
				<div class="p-3">
					<h5><a href="{{ $article->path() }}"><i class="fa fa-file-text mr-2" aria-hidden="true"></i><strong>{{ $article->title }}</strong></a></h5>

					@if ($author->isAuthorOf($article->original_article))
						<small class="text-muted"><em><strong>{{ $author->last_name }} is also an author of the original article</strong></em></small>
					@endif
					
					<p class="mt-3">{!! html_entity_decode($article->preview()) !!}... <a href="{{ $article->path() }}">click to read more</a></p>
					<ul class="authors">
						@foreach ($article->authors as $author)
						<small><li><strong><a href="{{ $author->path() }}" class="breaker">{{ $author->fullName() }}</a></strong> | {{ $author->position }} at {{ $author->research_institute }}</li></small>
						@endforeach
					</ul>
					@include('partials.reading-time-bar')
				</div>
				@endforeach
			</div>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
