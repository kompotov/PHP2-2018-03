<?php

namespace App\Controllers\Admin;

use App\AdminController;
use App\Models\Article;

class ArticleDelete extends AdminController
{

    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\NotFoundException
     */
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