<?php

namespace App\Http\Controllers;

use App\AvailableArticle;
use App\Category;
use App\Http\Controllers\Validators\ValidateAvailableArticle;
use Illuminate\Http\Request;

class AvailableArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    // CREATE
    public function create()
    {
        $articles = AvailableArticle::orderBy('created_at', 'desc')->paginate(8);
        $available_count = AvailableArticle::count();
        return view('admin/pages/available_articles', compact(['articles', 'available_count']));
    }

    public function store(Request $request)
    {
        ValidateAvailableArticle::createCheck($request);
        AvailableArticle::create($request->except('page'));
        return redirect()->back()->with('db_feedback', 'The Article is now available');
    }

    // READ
    public function index()
    {
        $categories = Category::with('available_articles')->get();
        // return $categories;
        return view('pages/available_articles', compact('categories'));
    }

    // UPDATE
    public function update(Request $request, AvailableArticle $availableArticle)
    {

        ValidateAvailableArticle::editCheck($request);
        $availableArticle->update($request->except('page'));
        return redirect()->back()->with('db_feedback', 'The available article has been updated');
    }

    // DELETE
    public function destroy(AvailableArticle $availableArticle)
    {
        $availableArticle->delete();
        return redirect()->back()->with('db_feedback', 'The article has been removed from the database');
    }
}
