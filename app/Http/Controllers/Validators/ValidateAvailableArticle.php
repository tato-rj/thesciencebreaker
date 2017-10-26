<?php

namespace App\Http\Controllers\Validators;

class ValidateAvailableArticle implements Validator
{
	public static function createCheck($request)
	{
		return $request->validate([
            'article' => 'required|unique:available_articles|max:255',
            'category_id' => 'required'
        ]);
	}
    public static function editCheck($request)
    {
        return $request->validate([
            'article' => 'required|max:255',
            'category_id' => 'required'
        ]);
    }
}