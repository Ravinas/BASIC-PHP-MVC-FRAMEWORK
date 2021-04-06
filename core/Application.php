<?php

namespace App\Core;


class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static $app;
    public function __construct($dirname)
    {
        self::$ROOT_DIR = $dirname;
        self::$app = $this;
        $this->response = new Response();
        $this->request = new Request();
        $this->router = new Router($this->request,$this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
