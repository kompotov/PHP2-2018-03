<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminArticleCreate extends AdminController
{

    protected function handle()
    {

        $this->view->article = new Article();
        $this->view->article->insert();

        header("Location: /admin/?admin=yes&ctrl=AdminArticle&id=" . $this->view->article->id);

    }

}