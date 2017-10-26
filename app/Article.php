<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $with = ['authors', 'editor', 'category'];
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function editor()
    {
    	return $this->belongsTo('App\Manager');
    }

    public function authors()
    {
    	return $this->belongsToMany('App\Author')->withTimestamps();
    }

    public function authorsIds()
    {
        return $this->authors->pluck('id')->toArray();
    }

    public function path()
    {
        return "/breaks/{$this->category->slug}/{$this->id}";
    }

    public static function createFrom($request)
    {
        $article = self::create([
            'title' => $request->title,
            'slug' => str_slug($request->title, '-'),
            'content' => $request->content,
            'reading_time' => $request->reading_time,
            'original_article' => $request->original_article,
            'category_id' => $request->category_id,
            'editor_id' => $request->editor_id,
            'doi' => self::createDoi(),
            'editor_pick' => $request->editor_pick
        ]);

        foreach ($request->authors as $author) {
            $article->authors()->attach($author);
        }
    }

    public function updateFrom($request)
    {
        $this->update([
            'title' => $request->title,
            'content' => $request->content,
            'reading_time' => $request->reading_time,
            'original_article' => $request->original_article,
            'category_id' => $request->category_id,
            'editor_id' => $request->editor_id,
            'editor_pick' => $request->editor_pick
        ]);
        $this->authors()->sync($request->authors);
    }

    public function similar()
    {
        return Article::where('category_id', $this->category_id)->orderBy('id', 'desc')->take(5)->get();
    }

    public function preview()
    {
        $pieces = explode(" ", strip_tags($this->content, '<br>'));
        return implode(" ", array_splice($pieces, 0, 120));
    }

    public static function records($length)
    {
        return self::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->whereRaw('created_at >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL '.$length.')), INTERVAL 1 DAY) and created_at <= NOW()')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) asc')
            ->get();
    }

    public static function createDoi()
    {
        $doi_base = "https://doi.org/10.25250/thescbr.brk";
        $last_doi = self::orderBy('id', 'desc')->first()->doi;
        $current_number = (int)substr($last_doi, -3);        
        $current_number+=1;
        $doi_number = str_pad($current_number, 3, '0', STR_PAD_LEFT);
        
        return $doi_base.$doi_number;
    }

}
