<?php

namespace App;

use App\TheScienceBreaker;

class AvailableArticle extends TheScienceBreaker
{
    protected $table = 'available_articles';
    protected $with = ['category'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
