<?php

namespace App\Http\Controllers;

use App\{Category, Article};
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Category $category, Request $request)
    {
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'title') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 5;
        $articles = Article::where('category_id', $category->id)->orderBy($sort, $order)->paginate($show);

        return view('pages.category', compact(['articles', 'category']));
    }

    public function edit(Category $category)
    {
        //
    }
 
    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
