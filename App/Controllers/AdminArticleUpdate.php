<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminArticleUpdate extends AdminController
{

    protected function handle()
    {

        $this->view->article = Article::findById($_GET['id']);

        if (false === $this->view->article) {
            header("Location: /admin/?admin=yes");
            exit;
        }

        if (isset($_POST['title']) && isset($_POST['content'])) {
            if ($_POST['title'] != '') {
                $this->view->article->title = $_POST['title'];
            }
            if ($_POST['content'] != '') {
                $this->view->article->content = $_POST['content'];
            }
            $this->view->article->save();
        }

        header("Location: /admin/?admin=yes&ctrl=AdminArticle&id=" . $this->view->article->id);

    }

}