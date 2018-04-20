<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

$articleId = $_GET['id'];
$article = \App\Models\Article::findById($articleId);

if (false === $article) {
    header("Location: /index.php");
    exit;
}

$view->article = $article;

$view->display(__DIR__ . '/templates/temp_article.php');
