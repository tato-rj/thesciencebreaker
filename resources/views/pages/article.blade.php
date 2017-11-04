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
			<div>
				<div id="author_info">
					<p></p>
				</div>
				<small><p id="author">by 
					@foreach ($article->authors as $author)
						{{ $loop->first ? '' : ', ' }}
						<a href="{{ $author->path() }}">{{ $author->fullName() }}</a> | {{ $author->position }}
					@endforeach
				</p></small>
			</div>
			
			@include('partials.reading-time-bar')
			
			{{-- Body --}}
			<div class="mt-4">
				{!! html_entity_decode($article->content) !!}
			</div>
			{{-- Editor --}}
			<div id="credits" class="mt-4">
				<h5>Edited by:</h5>
				<p><strong><a href="{{ $article->editor->path() }}" class="breaker">{{ $article->editor->fullName() }}</a></strong>, {{ $article->editor->position }}</p>
				<h5 class="mt-3">Original Article:</h5>
				<p><small>{!! html_entity_decode($article->original_article) !!}</small></p>
			</div>
			{{-- DISQUS --}}
			<div id="disqus_thread" class="mt-4 mb-5"></div>
			{{-- More From --}}
			<div class="jumbotron">
				<h5>More from {{ $article->category->name }}</h5>
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
@endsection
