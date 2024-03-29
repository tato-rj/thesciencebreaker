<?php

namespace App\Http\Controllers;

use App\{Article, Highlight, Author, ArticleAuthor, Category, Manager, Tag};
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Lang;
use App\Xml\Generator;
use Carbon\Carbon;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'fix', 'showData']]);
    }

    public function fix()
    {
        return now()->timestamp;
    }

    public function showXml()
    {        
        $editors = Manager::editors()->get();

        return view('admin/pages/breaks/xml', compact('editors'));
    }

    public function showData(Request $request, $id)
    {
        if ($request->id === '$2y$10$P75HCBUqXIO65SvfjKQ4vOg0vCzAiTAmWrZ2YtGhGMTIafOsfIo4e')
            return Article::where('id', $id)->with(['authors'])->first();

        abort(404);
    }

    public function uploadXml(Request $request)
    {
        $request->validate([
            'xml' => 'required|file|mimes:xml',
            'content' => 'required',
            'editor_id' => 'required',
            'image_caption' => 'max:255',
            'image_credits' => 'max:144'
        ]);

        $file = $request->xml;
   
        $generator = (new Generator($request->xml));

        $break = $generator->createBreak([
            'editor_id' => $request->editor_id,
            'image_caption' => $request->image_caption,
            'image_credits' => $request->image_credits,
            'content' => $request->content,
            'published_at' => $request->published_at ? Carbon::parse($request->published_at . $request->published_at_time) : null
        ]);

        foreach ($generator->createBreakers() as $breaker) {
            $break->authors()->attach($breaker);
        }

        $break->tags()->attach($generator->createKeywords());

        return redirect()->back()->with('db_feedback', 'The Break has been created');
    }

    public function index()
    {
        $popular = Article::published()->where('published_at', '>=', now()->subMonths(3))->popular(6)->get();
        $topics = Tag::orderBy('articles_count', 'DESC')->take(25)->get();
        $highlights = Highlight::with('article')->orderBy('relevance_order')->take(4)->get();
        $latest_articles = Article::published()->recent(6)->get();

        return view('pages.welcome', compact(['highlights', 'latest_articles', 'topics', 'popular']));
    }

    public function previewDOI()
    {
        return (new Article)->resources()->createDoi();
    }

    // CREATE
    public function create()
    {
        $editors = Manager::editors()->get();
        $tags = Tag::orderBy('name')->get();
        $authors = Author::orderBy('first_name')->get();

        return view('admin/pages/breaks/add', compact(['editors', 'authors', 'tags']));
    }

    public function store(Request $request)
    {  
        ArticleRequest::get()->save();
        return redirect()->back()->with('db_feedback', 'The Break has been successfully added!');
    }

    // READ
    public function show(Category $category, Article $article)
    {
        if (! $article->published_at)
            abort(404);

        $more_like = $article->resources()->suggestions();
        $next_read = $more_like->pop();
        $more_from = $article->similar()->published()->get();
        $article->increment('views');

        return view('pages.article', compact(['article', 'more_from', 'more_like', 'next_read']));
    }

    // UPDATE
    public function edit(Article $article = null)
    {
        $authors = Author::orderBy('first_name')->get();
        $breaks = Article::orderBy('created_at')->get();
        // return $breaks;
        $tags = Tag::orderBy('name')->get();
        $editors = Manager::editors()->get();

        return view('admin/pages/breaks/edit', compact(['editors', 'article', 'authors', 'tags', 'breaks']));
    }

    public function update(Request $request, Article $article)
    {
        ArticleRequest::get()->update($article);

        if ($request->update_url) {
            return redirect("/admin/breaks/{$article->slug}/edit")->with('db_feedback', 'The Break has been updated');
        }
        return redirect()->back()->with('db_feedback', 'The Break has been updated');
    }

    public function setTags(Request $request, Article $article)
    {
        $article->tags()->sync($request->tags);
    }

    public function authorsOrder(Request $request, Article $article)
    {
        foreach ($request->order as $index => $author) {
            ArticleAuthor::where([
                'article_id' => $article->id,
                'author_id' => $author
            ])->update([
                'relevance_order' => $index,
                'is_original_author' => $request->is_original_author[$index]
            ]);
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

    public function generateIssues()
    {
        $articles = Article::all();
        $articles->each(function($article) {
            $article->issue = $article->resources()->generateIssue($article->published_at);
            $article->save();
        });

        return Article::all();
    }

    public function generateVolumes()
    {
        $articles = Article::all();
        $articles->each(function($article) {
            $article->volume = $article->resources()->generateVolume($article->published_at);
            $article->save();
        });

        return Article::all();
    }

    public function issues()
    {
        $results = Article::selectRaw('year(published_at) AS year, SUBSTRING(issue, 5) AS issue, volume, count(*) as count')
            ->groupBy('year', 'issue', 'volume')
            ->orderBy('year', 'DESC')
            ->orderBy('issue', 'DESC')
            ->get();
       
        // $issues = $results->groupBy('volume');


        return $results;

        return view('issues', compact('issues'));
    }
}
