@extends('app')

@section('content')

<div class="container mt-4">

	<div class="row">
		<div id="category" class="col-lg-9 col-md-12">

			{{-- Category title (icon and name) --}}
			<div id="title" class="d-flex align-items-center mt-3">
				<div>
					<img src="{{ $category->paths()->icon() }}">
				</div>
				<div class="ml-3">
					<h2 class="mb-0 text-green"><strong>{{__('categories.'.$category->slug)}}</strong></h2>
				</div>
			</div>
	
			{{-- Sort results bar --}}
			@component('components/snippets/sort_bar')
				{{__('global.sort_bar.showing')}} <strong>{{ $articles->firstItem() }}-{{ $articles->lastItem() }}</strong> {{__('global.sort_bar.of')}} {{ $category->articles_count }}<span class="d-none d-sm-inline"> breaks</span>

				@slot('show')
				<option value="5" {{ (Request::input('show') == '5') ? 'selected' : '' }}>5</option>
				<option value="10" {{ (Request::input('show') == '10') ? 'selected' : '' }}>10</option>
				<option value="15" {{ (Request::input('show') == '15') ? 'selected' : '' }}>15</option>
				<option value="{{ $category->articles_count }}" {{ (Request::input('show') == $category->articles_count) ? 'selected' : '' }}>{{__('global.sort_bar.all')}}</option>
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

		{{-- Side Bar: Suggestion --}}
		@include('components/partials/side_bars/suggestions')

	</div>
</div>

@endsection
