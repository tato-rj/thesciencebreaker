<?php

namespace App;

use App\TheScienceBreaker;

class Highlight extends TheScienceBreaker
{
    public function article()
    {
    	return $this->belongsTo(Article::class)->with(['category', 'authors'])->published();
    }
}
