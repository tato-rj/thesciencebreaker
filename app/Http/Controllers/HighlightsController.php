<?php

namespace App\Http\Controllers;

use App\Category;
use App\Highlight;
use Illuminate\Http\Request;

class HighlightsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    // READ
    public function index()
    {
        //
    }

    // UPDATE
    public function edit()
    {
        $breaksByCategory = Category::with(['articles' => function($query) {
            return $query->orderBy('created_at', 'DESC');
        }])->get();
        $highlights = Highlight::orderBy('relevance_order')->get();
        return view('admin/pages/highlights', compact(['highlights', 'breaksByCategory']));
    }

    public function update(Request $request, Highlight $highlight)
    {
        $highlight->update(['article_id' => $request->article_id]);

        return redirect()->back()->with('db_feedback', 'The new highlight has been selected');
    }
}
