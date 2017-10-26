<?php

namespace App\Http\Controllers\Validators;

class ValidateAvailableArticle implements Validator
{
	public static function createCheck($request)
	{
		return $request->validate([
            'article' => 'required|unique:available_articles',
            'category_id' => 'required'
        ]);
	}
    public static function editCheck($request)
    {
        return $request->validate([
            'article' => 'required',
            'category_id' => 'required'
        ]);
    }
}