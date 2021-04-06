<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Core\Application;
use App\Controllers\ExampleController;

$ROOT_DIR = dirname(__DIR__);

$app = new Application($ROOT_DIR);

$app->router->get('/',[ExampleController::class,'index']);

$app->run();
