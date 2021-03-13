<?php


namespace App\Core;
use App\Core\Request;


class Router
{
    protected array $routes = [];
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path,$callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function resolve()
    {
        //Bulunduğumuz URL
       $path =  $this->request->getPath();
        //Gelen isteğin tipi
       $method = $this->request->getMethod();
        //İşenecek fonksiyon Closure
       $callback = $this->routes[$method][$path];
       echo  call_user_func($callback);
    }
}
