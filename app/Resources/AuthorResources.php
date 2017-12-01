<?php

namespace App\Resources;

use App\ArticleAuthor;

class AuthorResources extends Resources
{
    public function fullName()
    {
        return $this->model->first_name.' '.$this->model->last_name;
    }

    public function isAuthorOf($article)
    {
        return (stripos(' '.$article, $this->model->last_name));
    }

    public function orderIn($article)
    {
        return ArticleAuthor::where('article_id', $article->id)->where('author_id', $this->model->id)->pluck('relevance_order')->first();
    }

    // public static function generateSlugs()
    // {
    //     foreach (self::all() as $author) {
    //         $author->update([
    //             'slug' => str_slug($author->first_name.' '.$author->last_name)
    //         ]);
    //     }
    // }
}
