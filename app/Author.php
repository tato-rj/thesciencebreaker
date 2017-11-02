<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];
    
    public function articles()
    {
    	return $this->belongsToMany('App\Article')->withTimestamps();
    }

    public function fullName()
    {
    	return $this->first_name.' '.$this->last_name;
    }

    public static function generateSlugs()
    {
        foreach (self::all() as $author) {
            $author->update([
                'slug' => str_slug($author->first_name.' '.$author->last_name)
            ]);
        }
    }
}
