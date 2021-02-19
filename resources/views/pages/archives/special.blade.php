@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		{{-- Break Content --}}
		<div id="category" class="col-lg-9 col-md-12">
			{{-- Title --}}
		      @component('components/snippets/title')
		      Special Issues
		      @endcomponent
		      <hr class="mb-4 mt-2">
			{{-- Archives --}}
			@foreach ($special as $tag)
			<div class="mb-4">
				<a href="{{$tag->path()}}" class="d-flex align-items-center">
					<h3>
						<i class="fa fa-tag" aria-hidden="true"></i>
					</h3>
					<div class="ml-3">
						<h4 class="m-0"><strong>{{ ucfirst($tag->name) }}</strong></h4>
						<p class="m-0 text-muted">{{__('global.sort_bar.breaks_num')}}: {{ $tag->articles_count }}</p>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		{{-- Side Bar --}}
		@include('components/partials/side_bars/suggestions')
	</div>
</div>

@endsection
