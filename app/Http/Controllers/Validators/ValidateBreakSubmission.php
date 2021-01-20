<?php

namespace App\Http\Controllers\Validators;

use App\Rules\Recaptcha;

class ValidateBreakSubmission implements Validator
{
	public static function createCheck($request) {
        return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'institution_email' => 'required|email',
            'research_institute' => 'required|min:2',
            'original_article' => 'required',
            'position' => 'required',
            'file' => 'required|mimes:doc,docx,odt|max:5000',
            'description' => 'required|max:500',
            'g-recaptcha-response' => ['sometimes', new Recaptcha]
        ]);
    }

    public static function editCheck($request) {}
}
