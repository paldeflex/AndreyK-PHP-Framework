<?php

/** @var Application $app */

use App\Controllers\ContactController;
use Framework\Application;

$app->router->get('/', function () {
    view('home');
});

$app->router->get('/about', function () {
    view('about');
});

$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->post('/contact', [ContactController::class, 'send']);
