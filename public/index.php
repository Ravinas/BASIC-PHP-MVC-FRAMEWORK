<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Core\Application;

$app = new Application();

$app->router->get('/users',function (){
    return 'Hello World';
});

$app->router->get('/',function (){
    return 'İndex';
});


$app->run();
