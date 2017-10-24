<?php

namespace App\Http\Controllers;

use App\AvailableArticle;
use App\Category;
use Illuminate\Http\Request;

class AvailableArticlesController extends Controller
{

    public function index()
    {
        $categories = Category::with('available_articles')->get();
        // return $categories;
        return view('pages/available_articles', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AvailableArticle  $availableArticle
     * @return \Illuminate\Http\Response
     */
    public function show(AvailableArticle $availableArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AvailableArticle  $availableArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(AvailableArticle $availableArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AvailableArticle  $availableArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AvailableArticle $availableArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AvailableArticle  $availableArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvailableArticle $availableArticle)
    {
        //
    }
}
