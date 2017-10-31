<?php

namespace App\Http\Controllers\Validators;

class ValidateBreakSubmission implements Validator
{
	public static function createCheck($request) {
        return $request->validate([
            'full_name' => 'required|min:2',
            'institution_email' => 'required|email',
            'field_research' => 'required|min:2',
            'research_institute' => 'required|min:2',
            'original_article' => 'required',
            'position' => 'required',
            'file' => 'required|mimes:doc,docx,odt,txt,pdf|max:3000'
        ]);
    }

    public static function editCheck($request) {}
}
