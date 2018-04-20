<?php

use App\Exceptions\DbException;

require __DIR__ . '/App/autoload.php';

$ctrl = $_GET['ctrl'] ?? 'Index';

$class = 'App\Controllers\\' . $ctrl;

try {
    $ctrl = new $class();
    $ctrl();
} catch (DbException $e) {
    $class = 'App\Controllers\Error';
    $ctrl = new $class();
    $ctrl();
}