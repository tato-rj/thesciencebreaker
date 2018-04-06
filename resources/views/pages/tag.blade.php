@extends('app')

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
					<p class="m-0 text-muted">{{__('global.sort_bar.breaks_num')}}: {{ $tag->articles_count }}</p>
				</div>
			</div>
			{{-- Sort --}}
			@component('components/snippets/sort_bar')
				{{__('global.sort_bar.showing')}} <strong>{{ $articles->firstItem() }}-{{ $articles->lastItem() }}</strong> {{__('global.sort_bar.of')}} {{ $articles->total() }}<span class="d-none d-sm-inline"> breaks</span>
				@slot('show')
					<option value="5" {{ (Request::input('show') == '5') ? 'selected' : '' }}>5</option>
					<option value="10" {{ (Request::input('show') == '10') ? 'selected' : '' }}>10</option>
					<option value="15" {{ (Request::input('show') == '15') ? 'selected' : '' }}>15</option>
					<option value="{{ $tag->articles_count }}" {{ (Request::input('show') == $tag->articles_count) ? 'selected' : '' }}>{{__('global.sort_bar.all')}}</option>
				@endslot
				@slot('sort')
					<option value="created_at" {{ (Request::input('sort') == 'created_at') ? 'selected' : '' }}>{{__('global.sort_bar.date')}}</option>
					<option value="views" {{ (Request::input('sort') == 'views') ? 'selected' : '' }}>{{__('global.sort_bar.popular')}}</option>
					<option value="title" {{ (Request::input('sort') == 'title') ? 'selected' : '' }}>{{__('global.sort_bar.title')}}</option>
					<option value="reading_time" {{ (Request::input('sort') == 'reading_time') ? 'selected' : '' }}>{{__('global.sort_bar.reading_time')}}</option>
				@endslot
			@endcomponent
			{{-- Breaks --}}
			@foreach ($articles as $article)
				@include('components/partials/grids/results')
			@endforeach
			{{ $articles->appends(Request::except('page'))->links() }}
		</div>
		{{-- Side Bar --}}
		@include('components/partials/side_bars/suggestions')
	</div>
</div>

@endsection
