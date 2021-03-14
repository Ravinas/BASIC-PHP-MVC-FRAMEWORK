<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Core\Application;

$app = new Application();

$app->router->get('/contact',function (){
    echo 'Contact';
});

$app->router->get('/','home');

$app->run();
