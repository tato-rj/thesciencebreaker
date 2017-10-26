<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Controllers\Validators\ValidateBreaker;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    // CREATE
    public function create()
    {
        return view('admin/pages/breakers/add');
    }

    public function store(Request $request)
    {
        ValidateBreaker::createCheck($request);
        Author::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'position' => $request->position,
            'research_institute' => $request->research_institute,
            'field_research' => $request->field_research,
            'general_comments' => $request->general_comments
        ]);

        return redirect()->back()->with('db_feedback', 'The Breaker '.$request->first_name.' '.$request->last_name.' has been successfully added!');
    }

    // READ
    public function show(Author $author)
    {
        //
    }

    // UPDATE
    public function selectEdit()
    {
        $breakers = Author::orderBy('first_name')->get();
        return view('admin/pages/breakers/selectEdit', compact(['breakers']));
    }

    public function edit(Author $author)
    {
        return view('admin/pages/breakers/edit', compact(['author']));
    }

    public function update(Request $request, Author $author)
    {
        ValidateBreaker::editCheck($request);
        $author->update($request->all());
        return redirect()->back()->with('db_feedback', $author->first_name.'\'s profile has been updated');
    }

    // DELETE
    public function selectDelete()
    {
        $breakers = Author::orderBy('first_name')->get();
        return view('admin/pages/breakers/selectDelete', compact(['breakers']));  
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->back()->with('db_feedback', 'The Breaker has been removed from the database');
    }
}
