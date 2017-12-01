<?php

namespace App\Http\Requests;

use App\Article;

/*
|--------------------------------------------------------------------------
| VALIDATION
|--------------------------------------------------------------------------
|
| This class performs validaton according to the given rules.
|
*/

class ArticleRequest extends Form
{  
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'max:500',
            'content' => 'required',
            'reading_time' => 'required',
            'original_article' => 'required',
            'category_id' => 'required',
            'editor_id' => 'required',
            'pdf' => 'mimes:pdf',
            'image' => 'mimes:jpg,jpeg,png,svg|max:800',
            'image_caption' => 'max:255',
            'image_credits' => 'max:144'
        ];
    }

    public function create()
    {
        $this->slug($this->title);
        $this->saveFile();

        $article = Article::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image_caption' => $this->image_caption,
            'image_credits' => $this->image_credits,
            'content' => $this->content,
            'reading_time' => $this->reading_time,
            'original_article' => $this->original_article,
            'category_id' => $this->category_id,
            'editor_id' => $this->editor_id,
            'doi' => (new Article)->resources()->createDoi(),
            'editor_pick' => $this->editor_pick
        ]);

        foreach ($this->authors as $author) {
            $article->authors()->attach($author);
        }

        return $article;
    }

    public function edit(Article $article)
    {
        $this->slug($this->title);
        $this->saveFile();

        $article->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image_caption' => $this->image_caption,
            'image_credits' => $this->image_credits,
            'content' => $this->content,
            'reading_time' => $this->reading_time,
            'original_article' => $this->original_article,
            'category_id' => $this->category_id,
            'editor_id' => $this->editor_id,
            'editor_pick' => $this->editor_pick,
            'created_at' => $this->created_at
        ]);

        $article->authors()->sync($this->authors);
    }
}
