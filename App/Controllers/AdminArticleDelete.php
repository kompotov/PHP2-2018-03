<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminArticleDelete extends AdminController
{

    protected function handle()
    {

        $this->view->article = Article::findById($_GET['id']);

        if (false === $this->view->article) {
            header("Location: /admin/?admin=yes");
            exit;
        }

        $this->view->article->delete();

        header("Location: /admin/?admin=yes");

    }

}