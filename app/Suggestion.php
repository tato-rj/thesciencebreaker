<?php

namespace App;

use App\Article;

class Suggestion {

    public static function byTag($article)
    {
    	$tag = $article->tags()->having('articles_count', '!=', '1')->inRandomOrder()->first();

        if (is_null($tag)) {
            return Article::inRandomOrder()->take(4)->get(); 
        }

        return $tag->articles()->take(4)->get();

    }

	public static function one($article)
	{
        $suggestion = $article->tags()->having('articles_count', '!=', '1')->inRandomOrder()->first();
        if (is_null($suggestion)) {
            $suggestion = $article->category;
        }
        $article = $suggestion->articles()->inRandomOrder()->whereNotIn('id', [$article->id])->first();
        return $article;
	}

}