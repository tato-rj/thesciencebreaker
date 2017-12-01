<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Manager\TheScienceBreaker;

class ArticleAuthor extends TheScienceBreaker
{
    protected $table = 'article_author';
}
