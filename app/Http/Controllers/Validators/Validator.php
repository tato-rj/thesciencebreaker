<?php

namespace App\Http\Controllers\Validators;

interface Validator
{
	public static function check($request);
}