<?php

namespace App\Http\Requests;

use App\Author;

/*
|--------------------------------------------------------------------------
| VALIDATION
|--------------------------------------------------------------------------
|
| This class performs validaton according to the given rules.
|
*/

class AuthorRequest extends Form
{
    public function rules()
    {
        return [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'email',
            'position' => 'required',
            'research_institute' => 'required'
        ];
    }

    public function create()
    {
        $this->slug("$this->first_name $this->last_name");

        return Author::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'slug' => $this->slug,
            'email' => $this->email,
            'position' => $this->position,
            'research_institute' => $this->research_institute,
            'field_research' => $this->field_research,
            'general_comments' => $this->general_comments
        ]);
    }

    public function edit(Author $author)
    {
        $this->slug("$this->first_name $this->last_name");

        $author->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'slug' => $this->slug,
            'email' => $this->email,
            'position' => $this->position,
            'research_institute' => $this->research_institute,
            'field_research' => $this->field_research,
            'general_comments' => $this->general_comments
        ]);
    }
}
