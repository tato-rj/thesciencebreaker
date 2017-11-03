<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function fullName()
    {
    	return $this->first_name.' '.$this->last_name;
    }

    public function path()
    {
        return "/core-team/$this->slug";
    }

    public static function select($section, $position)
    {
        return self::where($section, $position)->get();
    }

    public function editedArticles()
    {
        return Article::where('editor_id', $this->id)->orderBy('created_at', 'DESC')->paginate(6);
    }

    public function editedArticlesCount()
    {
        return Article::where('editor_id', $this->id)->count();
    }

    public static function editors()
    {
    	return Manager::where('is_editor', 1)->get();
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
