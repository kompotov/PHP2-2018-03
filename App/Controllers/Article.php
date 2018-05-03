<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\NotFoundException;

class Article extends Controller
{
    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\NotFoundException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function handle()
    {
        $article = \App\Models\Article::findById($_GET['id']);

        if (false === $article) {
            throw new NotFoundException();
        }

        $template = $this->twig->load('temp_article.twig');

        $template->display(['article' => $article]);
    }
}