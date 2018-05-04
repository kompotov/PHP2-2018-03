<?php

namespace App\Controllers\Admin;

use App\AdminController;
use App\Exceptions\NotFoundException;

class Article extends AdminController
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

        $this->view->display(__DIR__ . '/../../../admin/templates/temp_admin-article.php');
    }

}