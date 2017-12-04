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
        
        if ($request->ajax()) {
            return $new_tag->id;
        }
        
        return redirect()->back()->with('db_feedback', 'The tag has been created');
    }

    // READ
    public function index(Request $request)
    {
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'name') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 20;

        $tags = Tag::orderBy($sort, $order)->paginate($show);
        return view('admin/pages/tags', compact('tags'));
    }

    public function show(Tag $tag, Request $request)
    {
        $input = $request->for;
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'title') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 5;
        $articles = $tag->articles()->orderBy($sort, $order)->paginate($show);
        return view('pages.tag', compact(['tag', 'articles']));
    }

    // UPDATE
    public function update(Request $request, Tag $tag)
    {
        $request->validate(['tag' => 'required|unique:tags,name']);
        $tag->update(['name' => $request->tag]);
        return redirect()->back()->with('db_feedback', 'The tag has been updated');
    }

    // DELETE
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach();
        $tag->delete();
        return redirect()->back()->with('db_feedback', 'The tag has been removed');
    }
}
