<?php

namespace App\Manager;

use Illuminate\Database\Eloquent\Model;

class TheScienceBreaker extends Model 
{

    protected $guarded = [];

    public static function createDoi()
    {
        $doi_base = "https://doi.org/10.25250/thescbr.brk";
        $last_doi = self::orderBy('id', 'desc')->first()->doi;
        $current_number = (int)substr($last_doi, -3);        
        $current_number+=1;
        $doi_number = str_pad($current_number, 3, '0', STR_PAD_LEFT);
        
        return $doi_base.$doi_number;
    }

}
