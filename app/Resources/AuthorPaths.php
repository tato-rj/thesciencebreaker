<?php

namespace App\Resources;

class AuthorPaths extends Resources
{
    public function route()
    {
        return "/breakers/".$this->model->slug;
    }
}
