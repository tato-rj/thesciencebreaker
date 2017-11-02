<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    // CREATE
    public function store(Request $request)
    {
        $request->validate(['tag' => 'required|unique:tags,name']);
        $new_tag = Tag::create(['name' => $request->tag]);
        return $new_tag->id;
    }

    // READ
    public function show(Tag $tag)
    {
        $articles = $tag->articles()->paginate(4);
        return view('pages.tag', compact(['tag', 'articles']));
    }

    // UPDATE
    public function update(Request $request, Tag $tag)
    {
        //
    }

    // DELETE
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach();
        $tag->delete();
    }
}
