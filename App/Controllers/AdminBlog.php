<?php

namespace App\Controllers;

use App\AdminController;
use App\Models\Article;

class AdminBlog extends AdminController
{

    protected function handle()
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../admin/templates/temp_admin-blog.php');
    }

}