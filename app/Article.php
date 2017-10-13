<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $with = ['authors', 'editor', 'category'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function editor()
    {
    	return $this->belongsTo('App\Manager');
    }

    public function authors()
    {
    	return $this->belongsToMany('App\Author');
    }

    public function path()
    {
        return "/breaks/{$this->category->slug}/{$this->id}";
    }

    public function similar()
    {
        return Article::where('category_id', $this->category_id)->orderBy('id', 'desc')->take(5)->get();
    }

    public function preview()
    {
        $pieces = explode(" ", strip_tags($this->content, '<br>'));
        return implode(" ", array_splice($pieces, 0, 120));
    }

}
