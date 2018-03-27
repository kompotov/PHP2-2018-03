<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

$sql = 'SELECT * FROM news WHERE id=:id AND title=:title';
$firstArticle = $db->query(
    $sql, \App\Models\Article::class,
    [
        'str' => [
            ':title' => 'Новый заголовок'
        ],
        'int' => [
            ':id' => 1
        ]
    ]
);
var_dump($firstArticle);

$sql = 'UPDATE news SET title=:title WHERE id=:id';
$updateTitle = $db->execute($sql, [':title' => 'Новый заголовок', ':id' => 1]);
var_dump($updateTitle);