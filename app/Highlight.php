<?php

namespace App;

use App\TheScienceBreaker;

class Highlight extends TheScienceBreaker
{
    public function article()
    {
    	return $this->belongsTo('App\Article')->with(['category', 'authors']);
    }
}
