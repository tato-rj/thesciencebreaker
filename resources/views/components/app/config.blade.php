{{--
/==========================================================================
/    META TAGS
/==========================================================================
/
/    General meta tags are written first. Page specific tags included in
/   if statements below
/
--}}

{{-- Browser settings --}}
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- Facebook --}}
<meta property="fb:app_id" content="1737765819883440" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:site_name" content="{{ config('app.name') }} | {{__('global.sub_title')}}">
{{-- Twitter --}}
<meta name="twitter:site" content="@sciencebreaker" />
<meta name="twitter:url" content="{{ url()->full() }}" />
<meta name="twitter:card" content="summary_large_image">
{{-- Check if current page is an article. If so, show specific meta tags for that page --}}
@if(isset($article) && $article->paths()->route() == '/'.\Request::path())
    {{-- Facebook --}}
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $article->title }}" />
    <meta property="og:description" content="{{ $article->description }} - submission by {{ $article->resources()->authorsList() }}" />
    <meta property="og:image" content="{{ asset($article->paths()->image()) }}" />
    {{-- Twitter --}}
    <meta name="twitter:title" content="{{ $article->title }}">
    <meta name="twitter:description" content="{{ $article->description }} - submission by {{ $article->resources()->authorsList() }}">
    <meta name="twitter:image" content="{{ asset($article->paths()->image()) }}">
    {{-- Global --}}
    <meta itemprop="name" content="{{ $article->title }}" />
    <meta itemprop="description" content="{{ $article->description }} - submission by {{ $article->resources()->authorsList() }}" />
    <meta itemprop="image" content="{{ asset($article->paths()->image()) }}" />
    <meta property="article:author" content="{{ $article->resources()->authorsList() }}" />
    <meta property="article:publisher" content="{{ url()->full() }}" />
    <meta property="article:section" content="{{ $article->category->name }}" />
    <meta property="article:published_time" content="{{ $article->created_at->toDateTimeString() }}" />
    <meta name="description" content="{{ $article->description }} - submission by {{ $article->resources()->authorsList() }}" />
    <meta name="abstract" content="{{ $article->description }} - submission by {{ $article->resources()->authorsList() }}" />
    <meta name="keywords" content="{{ $article->resources()->tagsList() }}" />
    <meta name="news_keywords" content="{{ $article->resources()->tagsList() }}" />
    <link rel="image_src" href="{{ asset($article->paths()->image()) }}" />
    <link rel="shortlink" href="{{ $article->doi }}" />
    {{-- Disqus --}}
    <meta name="disqus:title" content="{{ $article->title }}">
    <meta name="disqus:slug" content="{{ $article->slug }}">
{{-- If not an article, show the default meta tags --}}
@else
    {{-- Facebook --}}
    <meta property="og:title" content="{{ config('app.name') }} | Science Meets Society" />
    <meta property="og:description" content="For the democratization of scientific literature" />
    <meta property="og:image" content="{{ asset('images/tsb-default.png') }}" />
    {{-- Twitter --}}
    <meta name="twitter:title" content="{{ config('app.name') }} | Science Meets Society">
    <meta name="twitter:description" content="For the democratization of scientific literature">
    <meta name="twitter:image" content="{{ asset('images/tsb-default.png') }}">
    {{-- Global --}}
    <meta itemprop="name" content="{{ config('app.name') }} | Science Meets Society" />
    <meta itemprop="description" content="For the democratization of scientific literature" />
    <meta itemprop="image" content="{{ asset('images/tsb-default.png') }}" />
    <meta name="description" content="For the democratization of scientific literature" />
    <meta name="keywords" content="{{ $tagsList }}" />
    <meta name="news_keywords" content="{{ $tagsList }}" />
    <link rel="image_src" href="{{ asset('images/tsb-default.png') }}" />
@endif

{{--
/==========================================================================
/    GENERAL HEAD TAGS
/==========================================================================
/
/    Feed, title, css, jquery and favicon
/
--}}
<link rel="alternate" type="application/atom+xml" title="News" href="{{ config('app.url') }}/services/feed">
{{-- App Title --}}
<title>{{ config('app.name') }} | Science meets Society</title>
{{-- Browser tab icon --}}
<link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-32x32.png') }}" sizes="32x32" />
<link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-16x16.png') }}" sizes="16x16" />
{{-- Loading bar --}}
<script src="{{ asset('js/pace.min.js') }}"></script>
{{-- CSS --}}
<link rel="stylesheet" href="{{ asset('css/jquery-popover-0.0.3.css') }}">
<link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/app.css') }}?version=132" rel="stylesheet" type="text/css">
