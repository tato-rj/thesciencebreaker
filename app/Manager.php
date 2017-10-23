<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function fullName()
    {
    	return $this->first_name.' '.$this->last_name;
    }

    public static function position($position)
    {
        return self::where('position', $position)->get();
    }
}
