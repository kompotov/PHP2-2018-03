<?php

require __DIR__ . '/autoload.php';

$articleId = $_GET['id'];
$article = \App\Models\Article::findById($articleId);

if (false === $article) {
    header("Location: /admin-blog.php");
    exit;
}

$article->delete();
header("Location: /admin-blog.php");
exit;