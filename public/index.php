<?php

var_dump(PHP_MAJOR_VERSION);

if(PHP_MAJOR_VERSION < 8) {
    die('PHP version 8.0 or higher is required');
}

require_once __DIR__ . '/../config/init.php';
require_once ROOT . '/vendor/autoload.php';

dump($_SERVER);
