<?php

require __DIR__ . '/../autoload.php';

$cfg1 = \App\Config::getObject();
$cfg2 = \App\Config::getObject();

var_dump($cfg1);
var_dump($cfg2);