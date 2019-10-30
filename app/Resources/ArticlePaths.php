<?php

namespace App\Resources;

use Illuminate\Support\Facades\File;

class ArticlePaths extends Resources
{
    public function image()
    {
        $file = 'app/public/breaks/images/'.$this->model->slug.'/'.$this->model->slug.'.jpeg';

        // if (\Storage::exists($file))
            return asset(\Storage::url($file));

        return "images/no-image.png";
    }

    public function route()
    {
        return "/breaks/{$this->model->category->slug}/{$this->model->slug}";
    }

    public function pdf()
    {
        return "storage/app/public/breaks/".$this->model->slug.".pdf";
    }
}
