<?php

namespace App\Files;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Upload {

    protected $file;
    protected $filename;
    protected $path;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function name($name)
    {
        $ext = $this->file->extension();
        $this->filename = "$name.$ext";
        return $this;
    }

    public function path($path)
    {
        $this->path = $path;
        return $this;
    }

    public function save()
    {
        $filepath = $this->path.$this->filename;
        Storage::put($filepath, File::get($this->file));
    }

    public function replace()
    {
        File::cleanDirectory("storage/app$this->path");
        $this->save();
    }
}

