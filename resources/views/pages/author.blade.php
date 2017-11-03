@extends('_core')

@section('content')

<div class="container mt-5">
	<div class="row" id="author">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="jumbotron">
				<h4><strong>{{ $author->fullName() }}</strong></h4>
				<p>{{ $author->last_name }} is {{ $author->position }} at {{ $author->research_institute }}.</p>
				<p>This breaker has <strong>{{ $author->articles_count }}</strong> {{str_plural('break', $author->articles_count)}} published.</p>
				@if (!empty($author->general_comments))
					<p class="text-green mb-0 text-center "><em>{!! html_entity_decode($author->general_comments) !!}</em></p>
				@endif
			</div>
			<div>
				@foreach($author->articles as $article)
				<div class="mt-3 mb-5">
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
			</div>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
