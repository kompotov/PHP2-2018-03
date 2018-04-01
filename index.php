<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

$view->articles = \App\Models\Article::getNumOfLastArticles(3);

$view->display(__DIR__ . '/templates/temp_main-page.php');