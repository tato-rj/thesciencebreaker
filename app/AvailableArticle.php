<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableArticle extends Model
{
    protected $table = 'available_articles';
    protected $with = ['category'];
    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
