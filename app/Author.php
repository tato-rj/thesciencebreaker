<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }

    public function fullname()
    {
    	return $this->first_name.' '.$this->last_name;
    }
}
