<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $withCount = ['articles'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function articles()
	{
		return $this->hasMany('App\Article');
	}

	public function available_articles()
	{
		return $this->hasMany('App\AvailableArticle');
	}

	public function iconPath()
	{
		return "/images/categories-icons/{$this->slug}.svg";
	}

	public function path()
	{
		return "/breaks/{$this->slug}";
	}
}
