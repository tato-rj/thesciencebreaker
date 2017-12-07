<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function set(Request $request)
    {
    	Session::put('lang', $request->language);

    	return redirect()->back();
    }
}
