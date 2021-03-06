<?php

namespace App;

use App\TheScienceBreaker;

class Tag extends TheScienceBreaker
{
	protected $withCount = ['articles'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class)->published();
    }

    public function path()
    {
    	return "/tags/$this->name";
    }

    public static function list()
    {
        $tagsList = '';
        foreach (self::pluck('name') as $tag) {
            $tagsList .= $tag.', ';
        }
        $tagsList = substr($tagsList, 0, -2);
        return $tagsList;
    }

}
