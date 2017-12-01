<?php

namespace App\Manager\Traits;

trait ManagerScopeQueries
{
    public function scopeEditors($query)
    {
        return $query->where('is_editor', 1);
    }
}
