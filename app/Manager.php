<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Manager\Traits\RouteKeyName;
use App\Manager\Traits\ManagerScopeQueries;
use App\Manager\TheScienceBreaker;
use App\Resources\ManagerPaths;
use App\Resources\ManagerResources;

class Manager extends TheScienceBreaker
{
    use ManagerScopeQueries;

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
