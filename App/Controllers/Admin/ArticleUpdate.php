<?php

namespace App\Controllers\Admin;

use App\AdminController;
use App\Exceptions\NotFoundException;
use App\Models\Article;

class ArticleUpdate extends AdminController
{

    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\NotFoundException
     */
    protected function handle()
    {

        $article = Article::findById($_GET['id']);

        if (false === $article) {
            throw new NotFoundException();
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

        header('Location: /admin/?admin=yes&ctrl=Article&id=' . $article->id);

    }

}