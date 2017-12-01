<?php

namespace App;

use App\TheScienceBreaker;

class Highlight extends TheScienceBreaker
{
    protected $with = ['article'];

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }
}
