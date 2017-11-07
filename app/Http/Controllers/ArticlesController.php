<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\ArticleAuthor;
use App\Category;
use App\Manager;
use App\Tag;
use App\Mail\MailFactory;
use App\Http\Controllers\Validators\ValidateBreak;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        Manager::generateSlugs();
        return view('pages.welcome');
    }

    // CREATE
    public function create()
    {
        $editors = Manager::editors();
        $tags = Tag::orderBy('name')->get();
        $authors = Author::orderBy('first_name')->get();
        return view('admin/pages/breaks/add', compact(['editors', 'authors', 'tags']));
    }

    public function store(Request $request)
    {
        ValidateBreak::createCheck($request);
        $break = Article::createFrom($request);
        $file = self::saveFile($request);
        MailFactory::sendNotificationsTo($request->authors, $request->editor_id, $break);
        return redirect()->back()->with('db_feedback', 'The Break has been successfully added!');
    }

    // READ
    public function show($category, Article $article)
    {
        $next_read = Article::random();
        $more_like = Article::withTag($article->tags->first());
        $more_from = $article->similar()->get();
        $article->increment('views');
        return view('pages.article', compact(['article', 'more_from', 'more_like', 'next_read']));
    }

    // UPDATE
    public function selectEdit()
    {
        $breaks = Article::orderBy('title')->get();
        return view('admin/pages/breaks/selectEdit', compact(['breaks']));
    }

    public function edit(Article $article)
    {
        $authors = Author::orderBy('first_name')->get();
        $breaks = Article::orderBy('title')->get();
        $tags = Tag::orderBy('name')->get();
        $editors = Manager::editors();
        return view('admin/pages/breaks/edit', compact(['editors', 'article', 'authors', 'tags', 'breaks']));
    }

    public function update(Request $request, Article $article)
    {
        ValidateBreak::editCheck($request);
        $article->updateFrom($request);
        $file = self::saveFile($request);
        return redirect()->back()->with('db_feedback', 'The Break has been updated');
    }

    public function setTags(Request $request, Article $article)
    {
        $article->tags()->sync($request->tags);
    }

    public function authorsOrder(Request $request, Article $article)
    {
        foreach ($request->order as $order => $author) {
            ArticleAuthor::where('article_id', $article->id)->where('author_id', $author)->update(['relevance_order' => $order]);
        }
    }

    // DELETE
    public function selectDelete()
    {
        $breaks = Article::orderBy('title')->get();
        return view('admin/pages/breaks/selectDelete', compact(['breaks']));   
    }

    public function destroy(Article $article)
    {
        $article->authors()->detach();
        Storage::disk('public')->delete('/breaks/pdf/'.$article->slug.'.pdf');
        $article->delete();

        return redirect()->back()->with('db_feedback', 'The Break has been deleted');
    }

    protected static function saveFile(Request $request)
    {
        if ($request->file('file') !== null) {
            $file = $request->file('file');
            $ext = $file->extension();
            $name = str_slug($request->title);
            $file->storeAs("breaks/pdf/", "$name.$ext", 'public');
            return Storage::url("$name.$ext");
        }
    }

}
