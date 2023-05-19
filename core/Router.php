<?php

namespace Core;

class Router
{
    private array $routes = [];
    private array $pathParams;
    public Controller $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function get($pathServer, $actionServer)
    {
        $this->routes['GET'][] = [$pathServer, $actionServer];
    }

    public function post($pathServer, $actionServer)
    {
        $this->routes['POST'][] = [$pathServer, $actionServer];
    }

    public function resolve()
    {
        $pathUser = $_SERVER['REQUEST_URI'];
        $methodUser = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$methodUser] as $route) {
            $pathServer = $route[0];
            $actionServer = $route[1];

            if ($this->checkRoute($pathServer, $pathUser)) {
                return $this->execute($actionServer);
            }
        }

        $this->controller->render('404.php', ['title' => 'Page Introuvable']);
    }

    public function checkRoute($pathServer, $pathUser)
    {
        // remove query params
        $pathUser = explode('?', $pathUser)[0];
        $pathServer = preg_replace('#:([\w]+)#', '([^/]+)', $pathServer);
        $pathRegex = "#^$pathServer$#";

        if (preg_match($pathRegex, $pathUser, $pathParams)) {
            $this->pathParams = array_slice($pathParams, 1);
            return true;
        }

        return false;
    }

    public function execute($action)
    {
        $params = explode('@', $action);
        $class = 'App\Controller\\'.$params[0];

        $controller = new $class();
        $method = $params[1];
         $controller->$method($this->pathParams);
    }
}
