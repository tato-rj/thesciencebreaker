@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		{{-- Break Content --}}
		<div id="category" class="col-lg-9 col-md-12">
			{{-- Title --}}
		      @component('components/snippets/title')
		      Archives
		      @endcomponent
		      <hr class="mb-4 mt-2">
			{{-- Archives --}}
			@foreach ($archives as $year => $volume)
			<h4>{{$year}}</h4>
				@foreach($volume as $archive)
				<ul>
					<li><a href="/content/volume/{{$archive->volume}}/issue/{{$archive->issue}}">Volume {{$archive->volume}}, Issue {{$archive->issue}}</a><span class="ml-2 badge badge-light">{{$archive->count}} {{str_plural('publication', $archive->count)}}</span></li>
				</ul>
				@endforeach
			@endforeach
		</div>
		{{-- Side Bar --}}
		@include('components/partials/side_bars/suggestions')
	</div>
</div>

@endsection
