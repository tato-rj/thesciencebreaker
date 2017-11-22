@extends('_core')

@section('meta')
<meta property="fb:app_id" content="1737765819883440" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:title" content="{{ $article->title }}" />
<meta property="og:description" content="{{ $article->description }} - submission by {{ $article->authorsList() }}" />
<meta property="og:image" content="{{ asset($article->image()) }}" />

<meta name="twitter:site" content="@sciencebreaker" />
<meta name="twitter:title" content="{{ $article->title }}">
<meta name="twitter:url" content="{{ url()->full() }}" />
<meta name="twitter:description" content="{{ $article->description }} - submission by {{ $article->authorsList() }}">
<meta name="twitter:image" content="{{ asset($article->image()) }}">
<meta name="twitter:card" content="summary_large_image">

<meta itemprop="name" content="{{ $article->title }}" />
<meta itemprop="description" content="{{ $article->description }} - submission by {{ $article->authorsList() }}" />
<meta itemprop="image" content="{{ asset($article->image()) }}" />

<meta property="article:author" content="{{ $article->authorsList() }}" />
<meta property="article:publisher" content="{{ url()->full() }}" />
<meta property="article:section" content="{{ $article->category->name }}" />
<meta property="article:published_time" content="{{ $article->created_at->toDateTimeString() }}" />

<meta name="description" content="{{ $article->description }} - submission by {{ $article->authorsList() }}" />
<meta name="abstract" content="{{ $article->description }} - submission by {{ $article->authorsList() }}" />
<meta name="keywords" content="{{ $article->tagsList() }}" />
<meta name="news_keywords" content="{{ $article->tagsList() }}" />

<meta name="disqus:title" content="{{ $article->title }}">
<meta name="disqus:slug" content="{{ $article->slug }}">

<link rel="image_src" href="{{ asset($article->image()) }}" />
<link rel="shortlink" href="{{ $article->doi }}" />
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
			<h5 class="category-title d-flex align-items-center">
				<img class="mr-2" src="{{ $article->category->iconPath() }}"><a href="{{ $article->category->path() }}">{{ $article->category->name }}</a>
			</h5>
			{{-- Title --}}
			<h3><strong>{{ $article->title }}</strong></h3>
			<p class="text-muted">{{ $article->description }}</p>
			@if ($article->image() != 'images/no-image.png')
			<figure class="figure cover-image mb-0">
				<img src="{{ asset($article->image()) }}" class="figure-img img-fluid rounded" alt="{{ $article->image_caption }}">
				<figcaption class="figure-caption"><small>{{ $article->image_caption }} <strong>Credits: {{ $article->image_credits }}</strong></small></figcaption>
			</figure>
			@endif

			{{-- Open access, cc and doi link --}}
			<div class="d-flex justify-content-between mt-3">
				<div class="d-flex align-items-end">
					<a href="https://en.wikipedia.org/wiki/Open_access" target="_blank">
						<img src="/images/util-icons/open-access.svg">
					</a>
					<a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">
						<img src="/images/util-icons/cc.svg" class="ml-2">
					</a>
				</div>
				<div>
					<a id="doi" href="{{ $article->doi }}"><small>{{ $article->doi }}</small></a>
				</div>
			</div>
			{{-- Author --}}
			<div id="author-bar" class="mt-2 pt-1 mb-2 pb-1 d-flex align-items-center justify-content-between">
				<div>
					<small>by 
						@foreach ($article->authors as $author)
						{{ $loop->first ? '' : ', ' }}
							<span class="popover-wrapper">
							  <a data-role="popover" class="author text-orange cursor-link" data-url="{{ $author->path() }}" data-target="{{ $author->slug }}-popover">{{ $author->fullName() }}</a> | {{ $author->position }}
							  <div class="popover-modal p-3 {{ $author->slug }}-popover">
							    <div class="popover-body popover-body-padded">
							      <p class="mb-2"><i class="fa fa-user mr-2" aria-hidden="true"></i><strong>{{ $author->fullName() }}</strong> is {{ $author->position }} at {{ $author->research_institute }}.</p>
									@if ($author->isAuthorOf($article))
										<p class="mb-0 text-green">
											<strong>{{ $author->fullName() }} is also an author of the <a>original article</a></strong>
										</p>
									@endif
									<a href="{{ $author->path() }}" class="btn bg-default no-hover py-0 px-3 pull-right btn-sm" target="_blank">Profile</a>
							    </div>
							  </div>
							</span>
						@endforeach
					</small>
				</div>
				<div class="d-xs-none">
					<span class="popover-wrapper">
						<a data-role="popover" data-target="{{ $article->editor->slug }}-popover"><i class="ml-1 fa fa-info-circle"></i></a>
						<div class="popover-modal editor p-3 {{ $author->slug }}-popover">
							<div class="popover-body popover-body-padded">
								<small>
									<p class="mb-1"><strong>Edited by</strong></p>
									<p class="mb-0"> {{ $article->editor->fullName() }}</p>
									<p class="mb-2 text-muted"><em>{{ $article->editor->position }}</em></p>
									<a href="{{ $article->editor->path() }}" class="btn bg-default no-hover p-0 btn-block btn-sm" target="_blank">Profile</a>
								</small>
							</div>
						</div>
					</span>					
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
			<div>
				<h5 class="p-1 pl-2 bg-green text-white">
					We thought you might like
				</h5>
				@foreach ($more_like as $suggestion)
						@include('snippets/breaks_grid/rows_sm')			
				@endforeach
			</div>
			<div class="mt-4">
				<h5 class="p-1 pl-2 bg-green text-white">More from <a href="{{ $article->category->path() }}">{{ $article->category->name }}</a></h5>
				@foreach ($more_from as $suggestion)
					@include('snippets/breaks_grid/rows_sm')			
				@endforeach
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


// $(function () {
//   $('[data-toggle="popover"]').popover();
// });

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
<script type="text/javascript">
$('#author-bar .author').on('click', function() {
	$url = $(this).attr('data-url');
	if(isMobile()) {
		window.location.href = $url;
	}
});

if (!isMobile()) {
	$('[data-role="popover"]').popover();
}

function isMobile () {
	return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}
</script>
@endsection
