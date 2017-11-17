<?php

namespace App\Http\Controllers\Validators;

class ValidateManager implements Validator
{
	public static function createCheck($request)
	{
		return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email|unique:managers',
            'division_id' => 'required',
            'position' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png,svg|max:6000'
        ]);
	}

    public static function editCheck($request)
    {
        return $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            'division_id' => 'required',
            'position' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png,svg|max:6000'
        ]);
    }
}