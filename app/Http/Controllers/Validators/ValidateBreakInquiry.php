<?php

namespace App\Http\Controllers\Validators;

class ValidateBreakInquiry implements Validator
{
	public static function createCheck($request) {
        return $request->validate([
            'full_name' => 'required|min:2',
            'email' => 'required|email',
            'news_from' => 'required',
            'article_title' => 'required|min:2',
            'author_name' => 'required',
            'article_url' => 'required|url'
        ]);
    }

    public static function editCheck($request) {}
}