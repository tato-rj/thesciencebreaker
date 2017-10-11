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

    public function filename()
    {
    	$name = str_replace(' ', '', $this->name); // Replaces all spaces with hyphens.
    	$name = str_replace(',', '', $name); // Removes all commas.
		$name = preg_replace('/[^A-Za-z0-9\-]/', '', $name); // Removes special chars.
		return strtolower($name);
    }
}
