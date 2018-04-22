<?php

namespace App\Controllers\Admin;

use App\AdminController;
use App\Models\Article;

class Blog extends AdminController
{

    /**
     * @throws \App\Exceptions\DbException
     */
    protected function handle()
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../../admin/templates/temp_admin-blog.php');
    }

}