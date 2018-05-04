<?php

namespace App\Controllers\Admin;

use App\AdminController;
use App\Models\Article;

class ArticleCreate extends AdminController
{

    /**
     * @throws \App\Exceptions\DbException
     */
    protected function handle()
    {

        $article = new Article();
        $article->insert();

        header('Location: /admin/?admin=yes&ctrl=Article&id=' . $article->id);

    }

}