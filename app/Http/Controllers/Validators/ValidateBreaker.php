<?php

namespace App\Http\Controllers\Validators;

class ValidateBreaker implements Validator
{
	public static function check($request)
	{
		return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            'position' => 'required',
            'research_institute' => 'required',
            'field_research' => 'required'
        ]);
	}
}