<?php

namespace App\Resources;

class CategoryPaths extends Resources
{
    public function icon()
    {
        return "/images/categories-icons/{$this->model->slug}.svg";
    }

    public function route()
    {
        return "/breaks/{$this->model->slug}";
    }
}
