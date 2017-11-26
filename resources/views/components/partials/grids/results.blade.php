<div class="card card-horizontal-lg px-2 mb-4">
	<div class="row no-gutters align-items-top ">
		{{-- Image --}}
		<a class="col-lg-3 col-xs-12 card-image bg-image round-corners mb-2" href="{{ $article->path() }}" style="height: 9em; background-image: url(
			@if ($article->image() == 'images/no-image.png')
			{{ $article->category->iconPath() }});background-size:50%">
			@else
			{{ asset($article->image()) }});">
			@endif
		</a>
		<div class="col-lg-9 col-xs-12 card-block pl-3">
			{{-- Title --}}
			<a class="text-default" href="{{ $article->path() }}">
				<h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
			</a>
			{{-- Break preview --}}
			<p class="mb-2">{!! html_entity_decode($article->preview()) !!}... <a href="{{ $article->path() }}">click to read more</a></p>
		</div>		
	</div>

	<div>
		{{-- Author's list --}}
		<ul class="authors">
			@foreach ($article->authors as $author)
			<small><li><strong><a href="{{ $author->path() }}" class="breaker">{{ $author->fullName() }}</a></strong> | {{ $author->position }} at {{ $author->research_institute }}</li></small>
			@endforeach
		</ul>
		{{-- Reading time and date --}}
		<div class="d-flex justify-content-between align-items-center reading-time">
			<div>
				<i class="fa fa-eye" aria-hidden="true"></i>
				<small><span>Views </span>{{ $article->views }}</small>
			</div>
			<div class="flex-grow ml-2">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
				<small><span>Reading time </span>{{ $article->reading_time }} min</small>
			</div>
			<div>
				<small>published on {{ $article->created_at->toFormattedDateString() }}</small>
			</div>
		</div>
	</div>
</div>	