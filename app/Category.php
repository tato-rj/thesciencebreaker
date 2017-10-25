<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $withCount = ['articles'];
	protected static $colors = ['#c9e1ef','#f2f2f2','#3f4a5a','#252e3c','#ffd55c','#50c4d0','#f36e41'];

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

	public static function colors()
	{
		return self::$colors;
	}
}
