<?php

namespace App\Http\Controllers\Validators;

use App\Rules\Recaptcha;

class ValidateBreakInquiry implements Validator
{
	public static function createCheck($request) {
        return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            'g-recaptcha-response' => ['sometimes', new Recaptcha]
        ]);
    }

    public static function editCheck($request) {}
}
