<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{
    /**
     * @throws \App\Exceptions\DbException
     */
    protected function handle()
    {
        $article = \App\Models\Article::findById($_GET['id']);

        if (false === $article) {
            header("Location: /");
            exit;
        }

        $this->view->article = $article;

        $this->view->display(__DIR__ . '/../../templates/temp_article.php');
    }
}