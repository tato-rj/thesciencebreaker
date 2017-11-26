@extends('app')

@section('content')

<div class="container mt-4">
	<ol class="breadcrumb jumbotron py-3 mb-2">
		<li class="breadcrumb-item"><a href="/breakers">Breakers</a></li>
		<li class="breadcrumb-item active">{{ $author->fullName() }}</li>
	</ol>
	<div class="row" id="author">
		<div class="col-lg-9 col-md-12">
			<div class="mt-4 mb-4">
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
					@include('components/partials/grids/results')
				@endforeach
			</div>
		</div>
		{{-- Side Bar --}}
		@include('components/partials/side_bars/suggestions')
	</div>
</div>

@endsection
