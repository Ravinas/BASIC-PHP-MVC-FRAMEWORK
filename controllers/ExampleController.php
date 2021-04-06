<?php
namespace App\Controllers;

use App\Core\Application;

class ExampleController
{
    public function index()
    {
        $params = [
            'name' => 'Aras',
            'surname' => 'Şanıvar'
        ];
        return Application::$app->router->renderView('home',$params);
    }
}