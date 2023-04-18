<?php
declare(strict_types=1);

namespace Router;

class Router
{
    public string $url;
    public array $routes = [];
    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action): void
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function post(string $path, string $action): void
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    public function resolve(): void
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {

            $url = explode('?', trim($this->url, '/'));
            if ($route->matches($url[0])) {
                $route->execute();
                return;
            }
        }

        header('HTTP/1.0 404 Not Found');
    }
}