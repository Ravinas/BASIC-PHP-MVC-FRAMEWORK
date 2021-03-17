<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Core\Application;
$ROOT_DIR = dirname(__DIR__);

$app = new Application($ROOT_DIR);

//Routes dosyasına taşınacak
$app->router->get('/','home');
$app->router->get('/contact','contact');

$app->router->post('/contact','contact');

$app->run();
