<?php

require __DIR__ . '/../autoload.php';

$data = \App\Models\Article::getNumOfLastArticles(3);
var_dump($data);

$data = \App\Models\Article::findById(1);
var_dump($data);

$data = \App\Models\Article::findAll();
var_dump($data);