<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class EditorPicksController extends Controller
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
        $picks = Article::picks();
        return view('admin/pages/picks', compact(['picks', 'breaksByCategory']));
    }

    public function update(Request $request, $id)
    {
        $old_pick = Article::find($id);
        $new_pick = Article::find($request->pick);
        $old_pick->update(['editor_pick' => 0]);
        $new_pick->update(['editor_pick' => 1]);

        return redirect()->back()->with('db_feedback', 'The new pick has been selected');
    }

}
