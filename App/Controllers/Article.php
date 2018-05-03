<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\NotFoundException;

class Article extends Controller
{
    /**
     * @throws \App\Exceptions\DbException
     * @throws NotFoundException
     */
    protected function handle()
    {
        $article = \App\Models\Article::findById($_GET['id']);

        if (false === $article) {
            throw new NotFoundException();
        }

        $this->view->article = $article;

        $this->view->display(__DIR__ . '/../../templates/temp_article.php');
    }
}