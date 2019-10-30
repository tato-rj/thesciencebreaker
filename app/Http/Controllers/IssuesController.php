<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
	public function index()
	{
		$archives = Article::selectRaw('year(created_at) AS year, issue, volume, count(*) as count')
            ->groupBy('year', 'issue', 'volume')
            ->orderBy('year', 'DESC')
            ->orderBy('issue', 'DESC')
            ->get();

        $archives = $archives->groupBy('year');

		return view('pages/archives/index', compact(['archives']));
	}

	public function show($volume, $issue, Request $request)
	{
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'title') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 5;

		$articles = Article::where('volume', $volume)->where('issue', $issue)->orderBy($sort, $order)->paginate($show);

		return view('pages/archives/issue', compact(['articles', 'volume', 'issue']));
	}
}
