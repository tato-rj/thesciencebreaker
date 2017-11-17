<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Manager extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function division()
    {
        return $this->belongsTo('App\Division');
    }
    
    public function fullName()
    {
    	return $this->first_name.' '.$this->last_name;
    }

    public function path()
    {
        return "/core-team/$this->slug";
    }

    public function avatar()
    {
        if (File::exists("storage/app/managers/avatars/$this->slug")) {
            return File::allFiles("storage/app/managers/avatars/$this->slug")[0];//"storage/app/managers/avatars/$this->slug/$this->slug.png";
        } else {
            return "images/no-avatar.png";
        }        
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
