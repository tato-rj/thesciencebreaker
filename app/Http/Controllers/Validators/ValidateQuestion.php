<?php

namespace App\Http\Controllers\Validators;

class ValidateQuestion implements Validator
{
	public static function createCheck($request) {
        return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required'
        ]);
    }

    public static function editCheck($request) {}
}
