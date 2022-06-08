<?php

namespace App\Core;

use Exception;

class Router
{
    protected $routes = [];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes["GET"][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes["POST"][$uri] = $controller;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            $this->callAction(...explode("@", $this->routes[$method][$uri]));
        }else{
            throw new Exception('No route defined for this URI.');
        }
    }

    protected function callAction($controller, $method)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $method)){
            throw new Exception(
                "{$controller} doesn't repond to this {$method} action"
            );
        }
        
        return (new $controller)->$method();
    }
}