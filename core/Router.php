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
       $callback = $this->routes[$method][$path] ?? false;
       if (!$callback) {
          echo '404 Not Found';
          exit;
       }
       if (is_string($callback)) {
          return $this->renderView($callback);
       }
       if (is_callable($callback)) {
          return call_user_func($callback);
       }


    }

    public function renderView($view)
    {
        include_once __DIR__."/../views/$view.php";
    }
}
