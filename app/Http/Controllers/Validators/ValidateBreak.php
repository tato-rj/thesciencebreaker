<?php

namespace App\Http\Controllers\Validators;

class ValidateBreak implements Validator
{
	public static function createCheck($request)
	{
		return $request->validate([
            'title' => 'required|unique:articles|max:255',
            'content' => 'required',
            'reading_time' => 'required',
            'original_article' => 'required',
            'category_id' => 'required',
            'editor_id' => 'required',
            'file' => 'sometimes|mimes:pdf'
        ]);
	}
    public static function editCheck($request)
    {
        return $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'reading_time' => 'required',
            'original_article' => 'required',
            'category_id' => 'required',
            'editor_id' => 'required'
        ]);
    }
}