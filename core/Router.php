<?php


namespace App\Core;
use App\Core\Application;
use App\Core\Request;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path,$callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post($path,$callback)
    {
        $this->routes["post"][$path] = $callback;
    }

    public function resolve()
    {
       $path =  $this->request->getPath();
       $method = $this->request->getMethod();
       $callback = $this->routes[$method][$path] ?? false;
       if (!$callback) {
          $this->response->setStatusCode(404);
          return $this->renderView('_404');
       }
       if (is_string($callback)) {
          return $this->renderView($callback);
       }
       if (is_callable($callback)) {

       //   return call_user_func($callback);
       }
       if (is_array($callback))
       {

           $controller = new $callback[0];
           $action = $callback[1];
           return call_user_func([$controller,$action]);
       }



    }

    public function renderView($view)
    {
        //Layout HTML çıktısını cache'den aldık.
        $layoutContent = $this->layoutContent();
        //İçerik HTML çıktısını cache'den aldık.
        $viewContent = $this->renderContent($view);
        //Layout içinde belirttiğimiz content alanını view ile değiştiriyoruz.
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderContent($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}
