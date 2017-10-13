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

	public function iconPath()
	{
		return "/images/categories-icons/{$this->slug}.svg";
	}

	public function path()
	{
		return "/breaks/{$this->slug}";
	}

	public function getArticles()
	{
		return Article::where('category_id', $this->id)->orderBy('id', 'desc')->get();
	}
}
