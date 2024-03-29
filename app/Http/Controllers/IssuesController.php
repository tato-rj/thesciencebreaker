<?php

namespace App\Http\Controllers;

use App\{Article, Tag};
use Illuminate\Http\Request;

class IssuesController extends Controller
{
	public function index()
	{
		$archives = Article::selectRaw('year(published_at) AS year, issue, volume, count(*) as count')
			->published()
            ->groupBy('year', 'issue', 'volume')
            ->orderBy('year', 'DESC')
            ->orderBy('issue', 'DESC')
            ->get();

        $archives = $archives->groupBy('year');

		return view('pages/archives/index', compact(['archives']));
	}

	public function special()
	{
		$special = Tag::orderBy('articles_count', 'DESC')->take(10)->get();//->where('articles_count', '>=', 15)->all();

		return view('pages/archives/special', compact(['special']));
	}

	public function show($volume, $issue, Request $request)
	{
        $sort = ($request->sort) ? $request->sort : 'published_at';
        $order = ($sort == 'title') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 5;

		$articles = Article::where('volume', $volume)->published()->where('issue', $issue)->orderBy($sort, $order)->paginate($show);

		return view('pages/archives/issue', compact(['articles', 'volume', 'issue']));
	}
}
