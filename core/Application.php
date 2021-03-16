<?php

namespace App\Core;


class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public function __construct($dirname)
    {
        self::$ROOT_DIR = $dirname;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
