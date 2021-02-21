<?php

namespace App;

use App\TheScienceBreaker;
use App\Manager\Traits\ManagerScopeQueries;
use App\Resources\ManagerPaths;
use App\Resources\ManagerResources;

class Manager extends TheScienceBreaker
{
    use ManagerScopeQueries;

    protected $casts = ['is_alumni' => 'bool'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function paths()
    {
        return new ManagerPaths($this);
    }

    public function resources()
    {
        return new ManagerResources($this);
    }

    public function division()
    {
        return $this->belongsTo('App\Division');
    }
}
