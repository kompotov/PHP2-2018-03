<?php

require __DIR__ . '/autoload.php';

$article = new \App\Models\Article();
$article->insert();

header("Location: /admin-article.php?id=" . $article->id);
exit;