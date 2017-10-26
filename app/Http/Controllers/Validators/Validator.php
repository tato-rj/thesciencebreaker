<?php

namespace App\Http\Controllers\Validators;

interface Validator
{
	public static function createCheck($request);
	public static function editCheck($request);
}