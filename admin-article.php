<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $articleId = $_GET['id'];
    $article = \App\Models\Article::findById($articleId);
} elseif (isset($_GET['action']) && $_GET['action'] == 'new') {
    $article = new \App\Models\Article();
    $article->save();
} else {
    header("Location: /admin-blog.php");
    exit;
}

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

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $article->delete();
    header("Location: /admin-blog.php");
    exit;
}

include __DIR__ . '/templates/temp_admin-article.php';
