@extends('_core')

@section('meta')
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $article->title }}" />
<meta property="og:description" content="{{ $article->description }}" />
<meta property="og:image" content="" />

<meta name="twitter:title" content="{{ $article->title }}">
<meta name="twitter:description" content="{{ $article->description }}">
<meta name="twitter:image" content="">
<meta name="twitter:card" content="summary">
@endsection

@section('earlyJS')

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1737765819883440',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
@endsection

@section('content')
<div class="container mt-4">
	<div class="row">
		{{-- Social Icons --}}
		@include('partials.social-bar')
		{{-- Break Content --}}
		<div id="break" class="col-lg-8 col-md-12">
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
			<p class="text-muted">{{ $article->description }}</p>
			{{-- Open access, cc and doi link --}}
			<div class="d-flex justify-content-between mt-4">
				<div class="d-flex align-items-end">
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
				<div>
					<small class="d-xs-none">Edited by</small>
					<i class="ml-1 fa fa-info-circle" tabindex="0" data-toggle="popover" data-html="true" data-placement="auto" data-trigger="focus" title="Editor" data-content="{{ $article->editor->fullName() }}<br><small>{{ $article->editor->position }}</small>"></i>
				</div>

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
									<a class="breaker" href="{{ $author->path() }}">{{ $author->fullName() }}</a>
									@endforeach
								</strong></small></p>
								<p><small>Published {{ $break->created_at->diffForHumans() }} in <a class="breaker" href="{{ $break->category->path() }}">{{ $break->category->name }}</a></small></p>
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
									<a class="breaker" href="{{ $author->path() }}">{{ $author->fullName() }}</a>
									@endforeach
								</strong></small></p>
								<p><small>Published {{ $break->created_at->diffForHumans() }} in <a class="breaker" href="{{ $break->category->path() }}">{{ $break->category->name }}</a></small></p>
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

document.getElementById('shareFacebook').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: window.location.href,
  }, function(response){});
}

$('#twitter').on('click', function() {
	popitup($(this).attr('data-link'), 300);
});
$('#google-plus').on('click', function() {
	popitup($(this).attr('data-link'), 500);
});
function popitup(url, height) {
	newwindow=window.open(url ,'Share','height='+height+',width=450');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>
@endsection
