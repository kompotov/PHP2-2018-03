<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{

    /**
     * @throws \App\Exceptions\DbException
     */
    protected function handle()
    {
        $this->view->articles = Article::getNumOfLastArticles(3);
        $this->view->display(__DIR__ . '/../../templates/temp_main-page.php');
    }

}