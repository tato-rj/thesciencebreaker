<?php

namespace App;

use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Article extends Model
{

    protected $with = ['authors', 'editor', 'category', 'tags'];
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
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
    	return $this->belongsToMany('App\Author')->withPivot('relevance_order')->orderBy('relevance_order')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function tagsIds()
    {
        return $this->tags->pluck('id')->toArray();
    }

    public function authorsIds()
    {
        return $this->authors->pluck('id')->toArray();
    }

    public function authorsList()
    {
        $namesList = '';
        foreach ($this->authors as $author) {
            $namesList .= $author->fullName().', ';
        }
        $namesList = substr($namesList, 0, -2);
        return $namesList;
    }

    public function tagsList()
    {
        $tagsList = '';
        foreach ($this->tags as $tag) {
            $tagsList .= $tag->name.', ';
        }
        $tagsList = substr($tagsList, 0, -2);
        return $tagsList;
    }

    public function path()
    {
        return "/breaks/{$this->category->slug}/{$this->slug}";
    }

    public function pdf()
    {
        return "storage/app/breaks/$this->slug.pdf";
    }

    public function image()
    {
        if (File::exists("storage/app/breaks/images/$this->slug")) {
            return File::allFiles("storage/app/breaks/images/$this->slug")[0];
        } else {
            return "images/no-image.png";
        }   
    }

    public static function createFrom($request)
    {
        $article = self::create([
            'title' => $request->title,
            'slug' => str_slug($request->title, '-'),
            'description' => $request->description,
            'image_caption' => $request->image_caption,
            'image_credits' => $request->image_credits,
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

        return $article;
    }

    public function updateFrom($request)
    {

       

        $this->update([
            'title' => $request->title,
            'slug' => str_slug($request->title, '-'),
            'description' => $request->description,
            'image_caption' => $request->image_caption,
            'image_credits' => $request->image_credits,
            'content' => $request->content,
            'reading_time' => $request->reading_time,
            'original_article' => $request->original_article,
            'category_id' => $request->category_id,
            'editor_id' => $request->editor_id,
            'editor_pick' => $request->editor_pick,
            'created_at' => $request->created_at
        ]);
        $this->authors()->sync($request->authors);
    }

    public function preview()
    {
        $pieces = explode(" ", strip_tags($this->content, '<br>'));
        return implode(" ", array_splice($pieces, 0, 45));
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

    public static function picks()
    {
        return self::where('editor_pick', 1)->orderBy('title')->get();
    }

    public static function highlights()
    {
        return self::where('highlight', 1)->orderBy('title')->get();
    }

    public static function last()
    {
        return self::orderBy('id', 'desc')->first();
    }

    public static function generateSlugs()
    {
        foreach (self::all() as $article) {
            $article->update([
                'slug' => str_slug($article->title)
            ]);
        }
    }

    public function suggestion()
    {
        if (count($this->tags)) {
            $collection = $this->tags()->inRandomOrder()->first();
        } else {
            $collection = $this->category;
        }

        $results = $collection->articles->where('slug', '!=', $this->slug);
        
        if (count($results)) {
            return $results->first();
        }

        return $this->category->articles->where('slug', '!=', $this->slug)->first();
    }

    public function scopeRecent($query, $number)
    {
        return $query->orderBy('created_at', 'desc')->take($number);
    }

    public function scopeSimilar($query)
    {
        return $query->where('category_id', $this->category_id)->orderBy('id', 'desc')->take(5);
    }

    public function scopePopular($query, $number)
    {
        return $query->orderBy('views', 'desc')->take($number);
    }

    public function scopeEditorPicks($query)
    {
        return $query->where('editor_pick', 1);
    }

    public function scopeSearch($query, $word)
    {
        return $query
            ->where('title', 'LIKE', "%$word%")
            ->orWhere('content', 'LIKE', "%$word%")
            ->orWhereHas('authors', function($query) use ($word) {
                $query->where('first_name', 'LIKE', "%$word%")->orWhere('last_name', 'LIKE', "%$word%");
            })->orWhereHas('editor', function($query) use ($word) {
                $query->where('first_name', 'LIKE', "%$word%")->orWhere('last_name', 'LIKE', "%$word%");
            })->orWhereHas('category', function($query) use ($word) {
                $query->where('name', 'LIKE', "%$word%");
            })->orWhereHas('tags', function($query) use ($word) {
                $query->where('name', 'LIKE', "%$word%");
            });
    }

    public static function random()
    {
        return self::inRandomOrder()->first();
    }

}
