<a id="twitter" class="cursor-link" data-link="https://twitter.com/share?text={{ $article->title }} @sciencebreaker&hashtags=thesciencebreaker
	@foreach ($article->tags as $tag)
	,{{ strtolower(str_replace(' ','',$tag->name)) }}
	@endforeach
">
	<i class="fa fa-twitter" aria-hidden="true"></i>
</a>