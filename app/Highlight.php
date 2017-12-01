<?php

namespace App;

use App\Manager\TheScienceBreaker;
use Illuminate\Database\Eloquent\Model;

class Highlight extends TheScienceBreaker
{
    protected $with = ['article'];

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }
}
