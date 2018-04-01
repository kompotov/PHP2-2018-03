<?php

require __DIR__ . '/../autoload.php';

$data = \App\Models\Article::getNumOfLastArticles(3);
var_dump($data);

?> <hr> <?php

// Создаем новую статью и удаляем её.

$news = \App\Models\Article::findAll();
var_dump($news);

$article = new \App\Models\Article();
$article->title = 'Новая статья';
$article->content = 'Текст новости';
$article->save();

$news = \App\Models\Article::findAll();
var_dump($news);

$article->title = 'Обновленный заголовок';
$article->save();

$news = \App\Models\Article::findAll();
var_dump($news);

$article->delete();

$news = \App\Models\Article::findAll();
var_dump($news);

?> <hr> <?php

// Редактируем статью.

$article = \App\Models\Article::findById(1);
var_dump($article);

$article->title = 'Новый заголовок';
$article->save();

$article = \App\Models\Article::findById(1);
var_dump($article);