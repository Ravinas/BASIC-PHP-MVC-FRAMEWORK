<?php


namespace App\Core;


class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? false;
        if ($path === false) {
            echo '404 Not Found';
            exit;
        }

        $position = strpos($path,'?');
        if ($position === false)
        {
            return $path;
        }

        return substr($path,0,$position);

    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
