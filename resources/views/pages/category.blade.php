@extends('_core')

@section('content')

<div class="container mt-4">

	<div class="row">
		{{-- Break Content --}}
		<div id="category" class="col-lg-9 col-md-12">
			{{-- Title --}}
			<div id="title" class="d-flex align-items-center mt-3">
				<div>
					<img src="{{ $category->iconPath() }}">
				</div>
				<div class="ml-3">
					<h2 class="mb-0 text-green"><strong>{{ $category->name }}</strong></h2>
					{{-- <p class="m-0 text-muted">Number of breaks: {{ $category->articles_count }}</p> --}}
				</div>
			</div>
			{{-- Sort --}}
			<small class="d-flex justify-content-between align-items-end mt-4">
				<div>
					<span class="d-none d-sm-inline">showing </span><strong>{{ $articles->firstItem() }}-{{ $articles->lastItem() }}</strong> of {{ $category->articles_count }}<span class="d-none d-sm-inline"> breaks</span>
				</div>
				<div class="form-inline">
					<label class="mb-0 mr-2 d-none d-sm-inline">show</label>
					<form>
						<input type="hidden" name="sort" value="{{ Request::input('sort') }}">
						<select class="mr-2" name="show" onchange="this.form.submit()" id="show">
							<option value="5" {{ (Request::input('show') == '5') ? 'selected' : '' }}>5</option>
							<option value="10" {{ (Request::input('show') == '10') ? 'selected' : '' }}>10</option>
							<option value="15" {{ (Request::input('show') == '15') ? 'selected' : '' }}>15</option>
							<option value="{{ $category->articles_count }}" {{ (Request::input('show') == $category->articles_count) ? 'selected' : '' }}>all</option>
						</select>
					</form>
					<label class="mb-0 mr-2 d-none d-sm-inline">sort by</label>
					<form>
						<input type="hidden" name="show" value="{{ Request::input('show') }}">
						<select name="sort" onchange="this.form.submit()" id="sort">
							<option value="created_at" {{ (Request::input('sort') == 'created_at') ? 'selected' : '' }}>newest</option>
							<option value="views" {{ (Request::input('sort') == 'views') ? 'selected' : '' }}>most popular</option>
							<option value="title" {{ (Request::input('sort') == 'title') ? 'selected' : '' }}>title (a to z)</option>
							<option value="reading_time" {{ (Request::input('sort') == 'reading_time') ? 'selected' : '' }}>reading time</option>
						</select>
					</form>
				</div>
			</small>
			<hr class="mb-4 mt-2">
			{{-- Breaks --}}
			@foreach ($articles as $article)
				@include('snippets/breaks_grid/rows_lg')
			@endforeach
			{{ $articles->appends(Request::except('page'))->links() }}
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
