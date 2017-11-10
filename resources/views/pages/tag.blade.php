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
			{{-- Breaks --}}
			@foreach ($articles as $article)
				@include('snippets/breaks_list')
			@endforeach
			{{ $articles->links() }}
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
