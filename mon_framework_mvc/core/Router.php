<?php
// core/Router.php

class Router
{
    private $routes = [];

    public function add($route, $callback)
    {
        $this->routes[$route] = $callback;
    }

    public function dispatch($uri)
    {
        foreach ($this->routes as $route => $callback) {
            if ($route === $uri) {
                if (is_callable($callback)) {
                    return call_user_func($callback);
                } elseif (is_string($callback)) {
                    // Ex: 'HomeController@index'
                    $parts = explode('@', $callback);
                    $controllerName = $parts[0];
                    $methodName = $parts[1];

                    $controller = new $controllerName();
                    if (method_exists($controller, $methodName)) {
                        return $controller->$methodName();
                    }
                }
            }
        }
        // Si aucune route ne correspond
        http_response_code(404);
        echo "404 Not Found";
    }
}
