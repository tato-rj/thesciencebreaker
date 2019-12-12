<?php

namespace App\Resources;

use Illuminate\Support\Facades\File;

class ManagerPaths extends Resources
{
    public function route()
    {
        return "/core-team/".$this->model->slug;
    }

    public function avatar()
    {
        return asset($this->model->image_path);
        // if (File::exists("storage/app/managers/avatars/".$this->model->slug)) {
        // 	if (count(File::allFiles("storage/app/managers/avatars/".$this->model->slug))) {
	       //      return File::allFiles("storage/app/managers/avatars/".$this->model->slug)[0];
	       //  }
        // }

        // return "images/missing-avatar.svg";        
    }
}
