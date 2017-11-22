@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		{{-- Break Content --}}
		<div id="category" class="col-lg-9 col-md-12">
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
			{{-- Sort --}}
			{{-- Sort --}}
			@component('snippets/sort_bar')
				@slot('head')
					showing <strong>{{ $articles->firstItem() }}-{{ $articles->lastItem() }}</strong> of {{ $tag->articles_count }}<span class="d-none d-sm-inline"> breaks</span>
				@endslot
				@slot('show')
					<option value="5" {{ (Request::input('show') == '5') ? 'selected' : '' }}>5</option>
					<option value="10" {{ (Request::input('show') == '10') ? 'selected' : '' }}>10</option>
					<option value="15" {{ (Request::input('show') == '15') ? 'selected' : '' }}>15</option>
					<option value="{{ $tag->articles_count }}" {{ (Request::input('show') == $tag->articles_count) ? 'selected' : '' }}>all</option>
				@endslot
				@slot('sort')
					<option value="created_at" {{ (Request::input('sort') == 'created_at') ? 'selected' : '' }}>newest</option>
					<option value="views" {{ (Request::input('sort') == 'views') ? 'selected' : '' }}>most popular</option>
					<option value="title" {{ (Request::input('sort') == 'title') ? 'selected' : '' }}>title (a to z)</option>
					<option value="reading_time" {{ (Request::input('sort') == 'reading_time') ? 'selected' : '' }}>reading time</option>
				@endslot
			@endcomponent
			{{-- Breaks --}}
			@foreach ($articles as $article)
				@include('snippets/breaks_grid/rows_lg')
			@endforeach
			{{ $articles->links() }}
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
