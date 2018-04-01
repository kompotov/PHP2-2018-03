<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

$articleId = $_GET['id'];
$view->article = \App\Models\Article::findById($articleId);

if (false === $view->article) {
    header("Location: /index.php");
    exit;
}

$view->display(__DIR__ . '/templates/temp_article.php');
