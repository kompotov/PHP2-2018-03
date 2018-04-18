<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{
    protected function handle()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);

        if (false === $this->view->article) {
            header("Location: /");
            exit;
        }

        $this->view->display(__DIR__ . '/../../templates/temp_article.php');
    }
}