<?php

namespace App\Controllers\Admin;

use App\AdminController;

class Article extends AdminController
{

    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\NotFoundException
     */
    protected function handle()
    {
        $article = \App\Models\Article::findById($_GET['id']);

        if (false === $article) {
            header("Location: /admin/?admin=yes");
            exit;
        }

        $this->view->article = $article;

        $this->view->display(__DIR__ . '/../../../admin/templates/temp_admin-article.php');
    }

}