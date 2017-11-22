<?php

namespace App\Http\Controllers\Validators;

class ValidateBreaker implements Validator
{
	public static function createCheck($request)
	{
		return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'email',
            'position' => 'required',
            'research_institute' => 'required'
        ]);
	}

    public static function editCheck($request)
    {
        return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'email',
            'position' => 'required',
            'research_institute' => 'required'
        ]);
    }
}