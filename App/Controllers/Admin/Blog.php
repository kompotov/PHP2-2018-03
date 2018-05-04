<?php

namespace App\Controllers\Admin;

use App\AdminController;
use App\AdminDataTable;
use App\Models\Article;

class Blog extends AdminController
{

    /**
     * @throws \App\Exceptions\DbException
     */
    protected function handle()
    {
        $articles = Article::findAll();
        $functions = [
            'id' => function(Article $article) {
                return $article->id;
            },
            'title' => function(Article $article) {
                return $article->title;
            },
            'trimmedText' => function(Article $article) {
                return mb_strimwidth($article->content, 0, 12, '...');
            },
            'author' => function(Article $article) {
                return isset($article->author) ? $article->author->name : '—';
            }
        ];
        $table = new AdminDataTable($articles, $functions);
        $this->view->articles = $table->render();
        $this->view->display(__DIR__ . '/../../../admin/templates/temp_admin-blog.php');
    }

}