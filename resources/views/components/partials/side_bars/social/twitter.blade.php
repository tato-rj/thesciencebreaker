<a id="twitter" class="cursor-link" data-link="https://twitter.com/share?text={{ $article->title }} @sciencebreaker&url={{url()->current()}}&hashtags=thesciencebreaker
	@foreach ($article->tags as $tag)
	,{{ strtolower(str_replace(' ','',$tag->name)) }}
	@endforeach
">
	<i class="fab fa-twitter"></i>
</a>