<?php

namespace App;

use App\Article;
use App\Manager\TheScienceBreaker;
use App\Manager\Traits\RouteKeyName;
use Illuminate\Database\Eloquent\Model;
use App\Resources\CategoryPaths;

class Category extends TheScienceBreaker
{

	protected $withCount = ['articles'];

	public function getRouteKeyName()
    {
        return 'slug';
    }

	public function paths()
	{
		return new CategoryPaths($this);
	}
	
	public function articles()
	{
		return $this->hasMany('App\Article');
	}

	public function available_articles()
	{
		return $this->hasMany('App\AvailableArticle');
	}
}
