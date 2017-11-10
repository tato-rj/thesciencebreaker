@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		{{-- Break Content --}}
		<div id="category" class="col-lg-9 col-md-12">
			{{-- Title --}}
			<div id="title" class="d-flex align-items-center mt-4">
				<h3>
					<i class="fa fa-search" aria-hidden="true"></i>
				</h3>
				<div class="ml-3">
					<h4 class="m-0">Searching for <strong>"{{ $input }}"</strong></h4>
					<p class="m-0 text-muted">We found <strong>{{ $results->total() }}</strong> results</p>
				</div>
			</div>
			{{-- Breaks --}}
			@foreach ($results as $article)
				@include('snippets/breaks_list')
			@endforeach
			{{ $results->appends(Request::except('page'))->links() }}
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
