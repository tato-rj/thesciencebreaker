@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		{{-- Break Content --}}
		<div id="category" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			{{-- Title --}}
			<div id="title" class="d-flex align-items-center mt-4">
				<h3>
					<i class="fa fa-tag" aria-hidden="true"></i>
				</h3>
				<div class="ml-3">
					<h4 class="m-0"><strong>{{ $tag->name }}</strong></h4>
					<p class="m-0 text-muted">Number of breaks: {{ $tag->articles_count }}</p>
				</div>
			</div>
			{{-- Breaks --}}
			@foreach ($articles as $article)
			<div class="mt-5">
				<h5><a href="{{ $article->path() }}"><i class="fa fa-file-text mr-2" aria-hidden="true"></i><strong>{{ $article->title }}</strong></a></h5>
				<p class="mt-3">{!! html_entity_decode($article->preview()) !!}... <a href="{{ $article->path() }}">click to read more</a></p>
				<ul class="authors">
					@foreach ($article->authors as $author)
					<small><li><strong><a href="{{ $author->path() }}" class="breaker">{{ $author->fullName() }}</a></strong> | {{ $author->position }} at {{ $author->research_institute }}</li></small>
					@endforeach
				</ul>
				@include('partials.reading-time-bar')
			</div>
			@endforeach
			{{ $articles->links() }}
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection