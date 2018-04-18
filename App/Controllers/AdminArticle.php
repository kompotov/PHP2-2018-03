<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminArticle extends AdminController
{

    protected function handle()
    {
        $this->view->article = Article::findById($_GET['id']);

        if (false === $this->view->article) {
            header("Location: /admin/?admin=yes");
            exit;
        }

        $this->view->display(__DIR__ . '/../../admin/templates/temp_admin-article.php');
    }

}