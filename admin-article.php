<?php

require __DIR__ . '/autoload.php';

$articleId = $_GET['id'];
$article = \App\Models\Article::findById($articleId);

if (false === $article) {
    header("Location: /admin-blog.php");
    exit;
}

include __DIR__ . '/templates/temp_admin-article.php';