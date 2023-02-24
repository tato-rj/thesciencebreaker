<?php

namespace App;

use App\TheScienceBreaker;
use App\Manager\Traits\ArticleScopeQueries;
use App\Resources\ArticlePaths;
use App\Resources\ArticleResources;

class Article extends TheScienceBreaker
{
    use ArticleScopeQueries;
    
    protected $dates = ['published_at'];
    // protected $with = ['authors', 'editor', 'category', 'tags'];

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

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public static function currentIssuePath()
    {
        $lastBreak = Article::published()->orderBy('published_at', 'DESC')->first();
        
        return $lastBreak ? 
            "content/volume/$lastBreak->volume/issue/$lastBreak->issue"
            : null;
    }

    public static function hours()
    {
      $formatter = function ($time) {
        return date('G:i', $time);
      };
      
      $halfHourSteps = range(0, 47*1800, 1800);
      return array_map($formatter, $halfHourSteps);
    }
}
