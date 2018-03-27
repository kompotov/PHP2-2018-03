<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::getNumOfLastArticles(3);

include __DIR__ . '/templates/temp_main-page.php';