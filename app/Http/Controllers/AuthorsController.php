<?php

namespace App\Http\Controllers;

use App\Author;
use App\Mail\MailFactory;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'first_name' || $sort == 'last_name') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 5;
        $breakers = Author::orderBy($sort, $order)->paginate($show);

        return view('pages/presentation/breakers', compact('breakers'));
    }

    // CREATE
    public function create()
    {
        return view('admin/pages/breakers/add');
    }

    public function store(Request $request)
    {
        $breaker = AuthorRequest::get()->save();
        MailFactory::sendWelcomeEmail($breaker);
        
        return redirect()->back()->with('db_feedback', 'The Breaker '.$request->first_name.' '.$request->last_name.' has been successfully added!');
    }

    // READ
    public function show(Author $author)
    {
        return view('pages/author', compact('author'));
    }

    // UPDATE
    public function selectEdit()
    {
        $breakers = Author::orderBy('first_name')->get();
        return view('admin/pages/breakers/selectEdit', compact(['breakers']));
    }

    public function edit(Author $author)
    {
        $breakers = Author::orderBy('first_name')->get();
        return view('admin/pages/breakers/edit', compact(['author', 'breakers']));
    }

    public function update(Request $request, Author $author)
    {
        AuthorRequest::get()->update($author);
        return redirect('/admin/breakers/edit')->with('db_feedback', $author->first_name.'\'s profile has been updated');
    }

    // DELETE
    public function selectDelete()
    {
        $breakers = Author::orderBy('first_name')->get();
        return view('admin/pages/breakers/selectDelete', compact(['breakers']));  
    }

    public function destroy(Author $author)
    {
        $author->articles()->detach();
        $author->delete();
        return redirect()->back()->with('db_feedback', 'The Breaker has been removed from the database');
    }
}
