<?php

require __DIR__ . '/autoload.php';

$articleId = $_GET['id'];
$article = \App\Models\Article::findById($articleId);

if (false === $article) {
    header("Location: /admin-blog.php");
    exit;
}

if (isset($_POST['title']) && isset($_POST['content'])) {
    if ($_POST['title'] != '') {
        $article->title = $_POST['title'];
    }
    if ($_POST['content'] != '') {
        $article->content = $_POST['content'];
    }
    $article->save();
}

header("Location: /admin-article.php?id=" . $article->id);