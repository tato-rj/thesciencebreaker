<?php

namespace App\Http\Requests;

use App\Manager;

/*
|--------------------------------------------------------------------------
| VALIDATION
|--------------------------------------------------------------------------
|
| This class performs validaton according to the given rules.
|
*/

class ManagerRequest extends Form
{
    public function rules()
    {
        return [
            'title' => 'max:6',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            'division_id' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png,svg|max:6000'
        ];
    }

    public function create()
    {
        $this->slug("$this->first_name $this->last_name");        
        $avatar = $this->saveFile();

        return Manager::create([
            'title' => $this->title,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'slug' => $this->slug,
            'email' => $this->email,
            'division_id' => $this->division_id,
            'position' => $this->position,
            'biography' => $this->biography,
            'research_institute' => $this->research_institute,
            'is_editor' => $this->is_editor,
            'image_path' => $avatar,
            'is_alumni' => $this->is_alumni ? 1 : 0
        ]);
    }

    public function edit(Manager $manager)
    {
        $this->slug("$this->first_name $this->last_name");
        $avatar = $this->saveFile();
        
        $manager->update([
            'title' => $this->title,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'slug' => $this->slug,
            'email' => $this->email,
            'division_id' => $this->division_id,
            'position' => $this->position,
            'biography' => $this->biography,
            'research_institute' => $this->research_institute,
            'is_editor' => $this->is_editor,
            'image_path' => $avatar ?? $manager->image_path,
            'is_alumni' => $this->is_alumni ? 1 : 0
        ]);
    }
}
