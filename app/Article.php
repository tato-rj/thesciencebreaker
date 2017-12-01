<?php

namespace App;

use App\Manager\Traits\ArticleScopeQueries;
use App\Manager\TheScienceBreaker;
use Illuminate\Http\Request;
use App\Resources\ArticlePaths;
use App\Resources\ArticleResources;

class Article extends TheScienceBreaker
{
    use ArticleScopeQueries;
    
    protected $with = ['authors', 'editor', 'category', 'tags'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function resources()
    {
        return new ArticleResources($this);
    }

    public function paths()
    {
        return new ArticlePaths($this);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function editor()
    {
        return $this->belongsTo('App\Manager');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author')->withPivot('relevance_order')->orderBy('relevance_order')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
