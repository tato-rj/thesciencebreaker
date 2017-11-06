@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		{{-- Social Icons --}}
		@include('partials.social-bar')
		{{-- Break Content --}}
		<div id="break" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="tags mb-3">
				@foreach ($article->tags as $tag)
				<a href="{{ $tag->path() }}">
					<span class="badge badge-pill">{{ $tag->name }}</span>
				</a>
				@endforeach
			</div>
			
			{{-- Category --}}
			<h5>
				<a href="{{ $article->category->path() }}">{{ $article->category->name }}</a>
			</h5>
			{{-- Title --}}
			<h3><strong>{{ $article->title }}</strong></h3>
			{{-- Open access, cc and doi link --}}
			<div class="d-flex justify-content-between mt-4">
				<div class="d-flex align-items-baseline">
					<a href="https://en.wikipedia.org/wiki/Open_access" target="_blank">
						<img src="/images/util-icons/open-access.svg">
					</a>
					<a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">
						<img src="/images/util-icons/cc.svg" class="ml-2">
					</a>
				</div>
				<div>
					<a href="{{ $article->doi }}"><small>{{ $article->doi }}</small></a>
				</div>
			</div>
			{{-- Author --}}
			<div id="author-bar" class="mt-2 pt-1 mb-2 pb-1 d-flex align-items-center justify-content-between">
				<div>
					<small>by 
						@foreach ($article->authors as $author)
							{{ $loop->first ? '' : ', ' }}
							<a href="{{ $author->path() }}">{{ $author->fullName() }}</a> | {{ $author->position }}
						@endforeach
					</small>
				</div>
				<i class="ml-2 fa fa-info-circle" tabindex="0" data-toggle="popover" data-html="true" data-placement="auto" data-trigger="focus" title="Editor" data-content="{{ $article->editor->fullName() }}<br><small>{{ $article->editor->position }}</small>"></i>

			</div>
			
			@include('partials.reading-time-bar')
			
			{{-- Body --}}
			<div class="mt-4">
				{!! html_entity_decode($article->content) !!}
			</div>
			<div class="mt-4">
				<hr>
				<p class="mb-0"><strong>Next read:</strong> <a href="{{ $next_read->path() }}">{{ $next_read->title }}</a>
				<small>by 
					@foreach ($next_read->authors as $author)
						{{ $loop->first ? '' : ', ' }}
						<a class="breaker" href="{{ $author->path() }}">{{ $author->fullName() }}</a>
					@endforeach</small></p>
			</div>
			<hr>
			{{-- Editor --}}
			<div id="credits" class="mt-4">
{{-- 				<h5>Edited by:</h5>
				<p><strong><a href="{{ $article->editor->path() }}" class="breaker">{{ $article->editor->fullName() }}</a></strong>, {{ $article->editor->position }}</p> --}}
				<h5 class="mt-3">Original Article:</h5>
				<p><small>{!! html_entity_decode($article->original_article) !!}</small></p>
			</div>
			{{-- DISQUS --}}
			<div id="disqus_thread" class="mt-4 mb-5"></div>
			{{-- Also About --}}
			<div class="">
				<h5 class="p-1 pl-2 bg-green text-white">
					@if ($article->tags->first())
					Also about <a href="{{ $article->tags->first()->path() }}">{{ $article->tags->first()->name }}</a>
					@else
					We thought you might like
					@endif
				</h5>
				<table id="latest-breaks" class="mt-4">
					@foreach ($more_like as $break)
						<tr>
							<th>
								<img src="{{ $break->category->iconPath() }}">
							</th>
							<td>
								<p>
									<a href="{{ $break->path() }}">{{ $break->title }}</a>
								</p>
								<p><small><strong>Written by: 
									@foreach ($break->authors as $author)
									{{ $loop->first ? '' : ', ' }}
									{{ $author->fullName() }}
									@endforeach
								</strong></small></p>
								<p><small>Published {{ $break->created_at->diffForHumans() }} in {{ $break->category->name }}</small></p>
							</td>
						</tr>					
					@endforeach
				</table>
			</div>
			<div class="mt-4">
				<h5 class="p-1 pl-2 bg-green text-white">More from <a href="{{ $article->category->path() }}">{{ $article->category->name }}</a></h5>
				<table id="latest-breaks" class="mt-4">
					@foreach ($more_from as $break)
						<tr>
							<th>
								<i class="fa fa-flask text-muted" aria-hidden="true"></i>
							</th>
							<td>
								<p>
									<a href="{{ $break->path() }}">{{ $break->title }}</a>
								</p>
								<p><small><strong>Written by: 
									@foreach ($break->authors as $author)
									{{ $loop->first ? '' : ', ' }}
									{{ $author->fullName() }}
									@endforeach
								</strong></small></p>
								<p><small>Published {{ $break->created_at->diffForHumans() }} in {{ $break->category->name }}</small></p>
							</td>
						</tr>					
					@endforeach
				</table>
			</div>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/disqus.js') }}"></script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="popover"]').popover();
})
</script>
@endsection
