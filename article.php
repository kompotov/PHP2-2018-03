<?php

require __DIR__ . '/autoload.php';

$articleId = $_GET['id'];
$data = \App\Models\Article::findById($articleId);

if (false === $data) {
    header("Location: /index.php");
    exit;
}

include __DIR__ . '/templates/temp_article.php';
