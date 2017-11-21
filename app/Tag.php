<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $guarded = [];
	protected $withCount = ['articles'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article');
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
