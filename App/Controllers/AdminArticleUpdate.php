<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminArticleUpdate extends AdminController
{

    protected function handle()
    {

        $article = Article::findById($_GET['id']);

        if (false === $article) {
            header("Location: /admin/?admin=yes");
            exit;
        }

        if (isset($_POST['title']) && isset($_POST['content'])) {
            if ($_POST['title'] != '') {
                $article->title = $_POST['title'];
            }
            if ($_POST['content'] != '') {
                $article->content = $_POST['content'];
            }
            $article->save();
        }

        header("Location: /admin/?admin=yes&ctrl=AdminArticle&id=" . $article->id);

    }

}