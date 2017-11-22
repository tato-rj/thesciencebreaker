<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
	protected $guarded = [];
    protected $with = ['article'];

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }
}
