<?php

namespace App\Resources;

use Illuminate\Support\Facades\File;

class ArticlePaths extends Resources
{
    public function image()
    {
        if (File::exists("storage/app/breaks/images/".$this->model->slug)) {
            if (count(File::allFiles("storage/app/breaks/images/".$this->model->slug))) {
                return File::allFiles("storage/app/breaks/images/".$this->model->slug)[0];
            }
        }

        return "images/no-image.png";
    }

    public function route()
    {
        return "/breaks/{$this->model->category->slug}/{$this->model->slug}";
    }

    public function pdf()
    {
        return "storage/app/breaks/".$this->model->slug.".pdf";
    }
}
