<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $guarded = [];
    
    public function fullName()
    {
    	return $this->first_name.' '.$this->last_name;
    }

    public static function select($section, $position)
    {
        return self::where($section, $position)->get();
    }

    public static function editors()
    {
    	return Manager::where('is_editor', 1)->get();
    }
}
