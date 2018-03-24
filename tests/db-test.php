<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

$sql = 'SELECT * FROM news WHERE id=:id';
$firstArticle = $db->query($sql, \App\Models\Article::class, [':id' => 1]);
var_dump($firstArticle);

$sql = 'UPDATE news SET title=:title WHERE id=:id';
$updateTitle = $db->execute($sql, [':title' => 'Новый заголовок', ':id' => 1]);
var_dump($updateTitle);