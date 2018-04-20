<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminArticle extends AdminController
{

    protected function handle()
    {
        $article = Article::findById($_GET['id']);

        if (false === $article) {
            header("Location: /admin/?admin=yes");
            exit;
        }

        $this->view->article = $article;

        $this->view->display(__DIR__ . '/../../admin/templates/temp_admin-article.php');
    }

}