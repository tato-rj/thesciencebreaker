<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $withCount = ['articles'];

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
		return "/categories/{$this->slug}";
	}
}
