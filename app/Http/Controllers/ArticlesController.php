<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Suggestion;
use App\ArticleAuthor;
use App\Category;
use App\Manager;
use App\Tag;
use App\Mail\MailFactory;
use App\Http\Controllers\Validators\ValidateBreak;
use Illuminate\Support\Facades\Storage;
use App\Files\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        // Manager::generateSlugs();
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
        $slug = str_slug($request->title);
        ValidateBreak::createCheck($request);
        Article::createFrom($request);

        if ($request->file('pdf')) {
            (new Upload($request->file('pdf')))->name($slug)->path("/breaks/")->save();            
        }

        if ($request->file('image')) {
            (new Upload($request->file('image')))->name($slug)->path("/breaks/images/$slug/")->save();            
        }

        return redirect()->back()->with('db_feedback', 'The Break has been successfully added!');
    }

    // READ
    public function show($category, Article $article)
    {
        $next_read = Suggestion::one($article);
        $more_like = Suggestion::byTag($article);
        $more_from = $article->similar()->get();
        $article->increment('views');
        return view('pages.article', compact(['article', 'more_from', 'more_like', 'next_read']));
    }

    // UPDATE
    public function selectEdit()
    {
        $breaksByCategory = Category::with(['articles' => function($query) {
            return $query->orderBy('created_at', 'DESC');
        }])->get();
        return view('admin/pages/breaks/selectEdit', compact(['breaksByCategory']));
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
        $slug = $article->slug;

        if ($request->file('pdf')) {
            (new Upload($request->file('pdf')))->name($slug)->path("/breaks/")->save();            
        }

        if ($request->file('image')) {
            (new Upload($request->file('image')))->name($slug)->path("/breaks/images/$slug/")->replace();            
        }

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
        $breaksByCategory = Category::with(['articles' => function($query) {
            return $query->orderBy('created_at', 'DESC');
        }])->get();
        return view('admin/pages/breaks/selectDelete', compact(['breaksByCategory']));   
    }

    public function destroy(Article $article)
    {
        $article->authors()->detach();
        Storage::delete("breaks/$article->slug.pdf");
        File::deleteDirectory("storage/app/breaks/images/$article->slug");
        $article->delete();

        return redirect()->back()->with('db_feedback', 'The Break has been deleted');
    }

    public function destroyImage(Article $article)
    {
        $deleted = File::deleteDirectory("storage/app/breaks/images/$article->slug");
        return redirect()->back()->with('db_feedback', 'The image has been deleted');
    }
}
