<?php

namespace App;

use App\Manager\TheScienceBreaker;
use Illuminate\Database\Eloquent\Model;
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

}
