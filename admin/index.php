<?php

require __DIR__ . '/../App/autoload.php';

$ctrl = $_GET['ctrl'] ?? 'AdminBlog';

$class = 'App\Controllers\\' . $ctrl;

$ctrl = new $class();
$ctrl();