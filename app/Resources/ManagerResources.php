<?php

namespace App\Resources;

use App\ArticleAuthor;
use App\Article;

class ManagerResources extends Resources
{
    public function fullName()
    {
        $title = ($this->model->title) ? $this->model->title.' ' : null;
        return $title.$this->model->first_name.' '.$this->model->last_name;
    }

    public function editedArticles()
    {
        return Article::where('editor_id', $this->model->id)->published()->orderBy('created_at', 'DESC')->paginate(6);
    }

    public function editedArticlesCount()
    {
        return Article::where('editor_id', $this->model->id)->published()->count();
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
