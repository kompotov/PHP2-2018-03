<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminArticleDelete extends AdminController
{

    protected function handle()
    {

        $article = Article::findById($_GET['id']);

        if (false === $article) {
            header("Location: /admin/?admin=yes");
            exit;
        }

        $article->delete();

        header("Location: /admin/?admin=yes");

    }

}