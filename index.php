<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::getLast3Articles();

include __DIR__ . '/templates/temp_main-page.php';
