<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminArticleCreate extends AdminController
{

    protected function handle()
    {

        $article = new Article();
        $article->insert();

        header("Location: /admin/?admin=yes&ctrl=AdminArticle&id=" . $article->id);

    }

}