<?php

namespace App;

use App\TheScienceBreaker;
use App\Resources\AuthorPaths;
use App\Resources\AuthorResources;

class Author extends TheScienceBreaker
{
    protected $withCount = ['articles'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function resources()
    {
        return new AuthorResources($this);
    }

    public function paths()
    {
        return new AuthorPaths($this);
    }

    public function articles()
    {
    	return $this->belongsToMany('App\Article')->withTimestamps();
    }

    public function isOriginalAuthorOf($articleId)
    {
        return ArticleAuthor::where([
            'article_id' => $articleId,
            'author_id' => $this->id,
        ])->value('is_original_author');
    }
}
