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
    public function create(Request $request)
    {
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'category_id') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 5;
        $articles = AvailableArticle::orderBy($sort, $order)->paginate($show);

        return view('admin.pages.available_articles', compact('articles'));
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
        return view('pages.for_breakers.available_articles', compact('categories'));
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
