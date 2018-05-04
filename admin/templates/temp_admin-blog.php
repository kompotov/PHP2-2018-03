<?php

use App\Models\Article;

$functions = [
    'Id' => function(Article $article) {
        return $article->id;
    },
    'Заголовок' => function(Article $article) {
        return $article->title;
    },
    'Текст' => function(Article $article) {
        return mb_strimwidth($article->content, 0, 12, '...');
    },
    'Автор' => function(Article $article) {
        return isset($article->author) ? $article->author->name : '—';
    },
    'Редактировать' => function(Article $article) {
        return '<a href="/admin/?admin=yes&ctrl=Article&id=' . $article->id . '">Редактировать</a>';
    },
    'Удалить' => function(Article $article) {
        return '<a href="/admin/?admin=yes&ctrl=ArticleDelete&id=' . $article->id . '">Удалить</a>';
    },
    'Читать' => function(Article $article) {
        return '<a href="/?ctrl=Article&id=' . $article->id . '">Читать</a>';
    },
];

$table = new \App\AdminDataTable($this->articles, $functions);

?>

<a href="/admin/?admin=yes&ctrl=ArticleCreate">Создать новую статью</a>

<hr>

<?= $table->render(); ?>

