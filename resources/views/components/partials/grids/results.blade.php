<div class="card card-horizontal-lg px-2 mb-4">
	<div class="row no-gutters align-items-top ">
		{{-- Image --}}
		<a class="col-lg-3 col-xs-12 card-image bg-image round-corners mb-2" href="{{ $article->paths()->route() }}" style="height: 9em; background-image: url(
			@if ($article->paths()->image() == 'images/no-image.png')
			{{ $article->category->paths()->icon() }});background-size:50%">
			@else
			{{ asset($article->paths()->image()) }});">
			@endif
		</a>
		<div class="col-lg-9 col-xs-12 card-block pl-3">
			{{-- Title --}}
			<a class="text-default" href="{{ $article->paths()->route() }}">
				<h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
			</a>
			{{-- Break preview --}}
			<p class="mb-2">{!! html_entity_decode($article->resources()->preview()) !!}... <a href="{{ $article->paths()->route() }}">click to read more</a></p>
		</div>		
	</div>

	<div>
		{{-- Author's list --}}
		<ul class="authors mb-1">
			@foreach ($article->authors as $author)
			<small><li><strong><a href="{{ $author->paths()->route() }}" class="breaker">{{ $author->resources()->fullName() }}</a></strong> | {{ $author->position }} at {{ $author->research_institute }}</li></small>
			@endforeach
		</ul>
		<div class="d-flex mb-3">
			@foreach ($article->tags as $tag)
				<div class="d-flex tags m-1">
					<a href="{{ $tag->path() }}">
						<span class="badge badge-pill">{{ $tag->name }}</span>
					</a>
				</div>
			@endforeach
		</div>
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