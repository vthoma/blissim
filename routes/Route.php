<?php
declare(strict_types=1);

namespace Router;

use Config\Database;

class Route
{
    public string $path;
    public string $action;
    public array $matches = [];
    public function __construct(string $path, string $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url): bool
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        $params = explode('@', $this->action);
        $controller = new $params[0](new Database(DB_NAME, DB_HOST, DB_USER, DB_PWD));
        $method = $params[1] ?? '__invoke';

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}