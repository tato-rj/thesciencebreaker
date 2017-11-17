<?php

namespace App\Http\Controllers\Validators;

class ValidateBreak implements Validator
{
	public static function createCheck($request)
	{
		return $request->validate([
            'title' => 'required|unique:articles|max:255',
            'description' => 'max:500',
            'content' => 'required',
            'reading_time' => 'required',
            'original_article' => 'required',
            'category_id' => 'required',
            'editor_id' => 'required',
            'pdf' => 'mimes:pdf',
            'image' => 'mimes:jpg,jpeg,png,svg|max:800',
            'image_caption' => 'max:255',
            'image_credits' => 'max:144'
        ]);
	}
    public static function editCheck($request)
    {
        return $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:500',
            'content' => 'required',
            'reading_time' => 'required',
            'original_article' => 'required',
            'category_id' => 'required',
            'editor_id' => 'required',
            'pdf' => 'mimes:pdf',
            'image' => 'mimes:jpg,jpeg,png,svg|max:800',
            'image_caption' => 'max:255',
            'image_credits' => 'max:144'
        ]);
    }
}