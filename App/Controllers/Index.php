<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{

    /**
     * @throws \App\Exceptions\DbException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function handle()
    {
        $articles = Article::getNumOfLastArticles(3);
        $template = $this->twig->load('temp_main-page.twig');
        $template->display(['articles' => $articles]);
    }

}