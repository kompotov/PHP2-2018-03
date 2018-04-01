<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

if (isset($_GET['id'])) {
    $articleId = $_GET['id'];
    $view->article = \App\Models\Article::findById($articleId);
} elseif (isset($_GET['action']) && $_GET['action'] == 'new') {
    $view->article = new \App\Models\Article();
    $view->article->save();
} else {
    header("Location: /admin-blog.php");
    exit;
}

if (false === $view->article) {
    header("Location: /admin-blog.php");
    exit;
}

if (isset($_POST['title']) && isset($_POST['content'])) {
    if ($_POST['title'] != '') {
        $view->article->title = $_POST['title'];
    }
    if ($_POST['content'] != '') {
        $view->article->content = $_POST['content'];
    }
    $view->article->save();
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $view->article->delete();
    header("Location: /admin-blog.php");
    exit;
}

$view->display(__DIR__ . '/templates/temp_admin-article.php');
