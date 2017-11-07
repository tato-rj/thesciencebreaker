@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		{{-- Break Content --}}
		<div id="category" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			{{-- Title --}}
			<div id="title" class="d-flex align-items-center mt-3">
				<div>
					<img src="{{ $category->iconPath() }}">
				</div>
				<div class="ml-3">
					<h3 class="mb-0 text-green"><strong>{{ $category->name }}</strong></h3>
					<p class="m-0 text-muted">Number of breaks: {{ $category->articles_count }}</p>
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
