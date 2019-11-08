<?php

namespace App\Http\Requests;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Form
{
	use ValidatesRequests;

	protected $request;
	protected $slug;

	public function __construct(Request $request = null)
	{
		$this->request = $request ?: request();
	}

	abstract protected function rules();

    public static function get()
    {
        return new static;
    }
    	
	public function isValid()
	{
		try {
            $this->created_at = Carbon::parse("$this->created_at 00:00:00")->format('Y-m-d H:i:s');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['Check the date format! It must be M/D/Y']);
        }
		
		$this->validate($this->request, $this->rules());
		return true;
	}

	public function save()
	{

		if ($this->isValid()) {			
			return $this->create();
		}

		return false;
	}

	public function update($model)
	{

		if ($this->isValid()) {
			return $this->edit($model);
		}

		return false;
	}

    public function saveFile()
    {
        if ($this->request->file('pdf')) {
            $file = (new FileUpload($this->request->file('pdf')))->name($this->slug)->path("/breaks/")->save();            
        }

        if ($this->request->file('image')) {
            $file = (new FileUpload($this->request->file('image')))->name($this->slug)->path("/breaks/images/$this->slug/")->save();            
        }

        if ($this->request->file('avatar')) {
            $file = (new FileUpload($this->request->file('avatar')))->name($this->slug)->path("/managers/avatars/$this->slug/")->save();            
        }

        return $file;
    }

	public function __get($property)
	{
		if ($this->request->has($property)) {
			return $this->request->input($property);
		}

		return null;
	}

	public function slug($input)
	{
		$this->slug = str_slug($input);
	}
}
