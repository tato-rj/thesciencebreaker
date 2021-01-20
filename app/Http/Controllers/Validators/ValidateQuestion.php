<?php

namespace App\Http\Controllers\Validators;

use App\Rules\Recaptcha;

class ValidateQuestion implements Validator
{
	public static function createCheck($request) {
        return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => ['sometimes', new Recaptcha]
        ]);
    }

    public static function editCheck($request) {}
}
