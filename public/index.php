<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Core\Application;
use App\Controllers\ExampleController;

$ROOT_DIR = dirname(__DIR__);

$app = new Application($ROOT_DIR);

//Routes dosyasına taşınacak
$app->router->get('/','home');
$app->router->get('/contact',[ExampleController::class,'index']);

$app->run();
