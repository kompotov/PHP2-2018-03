<?php

use App\Exceptions\DbException;
use App\Exceptions\NotFoundException;

require __DIR__ . '/App/autoload.php';

$ctrl = $_GET['ctrl'] ?? 'Index';

$class = 'App\Controllers\\' . $ctrl;

try {
    $ctrl = new $class();
    $ctrl();
} catch (DbException $e) {
    header('Location: /?ctrl=Error');
} catch (NotFoundException $e) {
    header('Location: /?ctrl=NotFound');
}