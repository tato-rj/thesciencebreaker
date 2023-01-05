<?php

namespace App;

use App\TheScienceBreaker;
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
		return $this->hasMany(Article::class)->orderBy('created_at', 'DESC');
	}

	public function available_articles()
	{
		return $this->hasMany(AvailableArticle::class);
	}

    public function scopeByName($query, $name)
    {
        return $query->whereRaw('lower(name) like (?)', strtolower($name));
    }
}
