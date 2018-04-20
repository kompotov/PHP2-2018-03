<?php

require __DIR__ . '/../autoload.php';

$view = new \App\View();

$view->articles = \App\Models\Article::findAll();

$view->display(__DIR__ . '/templates/temp_admin-blog.php');
