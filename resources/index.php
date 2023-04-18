<?php
declare(strict_types=1);

use Router\Router;
use App\Support\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'resources/views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
const DB_NAME = 'blissim';
const DB_HOST = 'localhost';
const DB_USER = 'user';
const DB_PWD = 'password';

// Routes
$router = new Router($_SERVER["REQUEST_URI"]);


$router->get(path: '/', action: 'App\Controllers\ProductController@index');
$router->get(path: '/product/:id', action: 'App\Controllers\ProductController@show');
$router->post(path: '/product/:id', action: 'App\Controllers\ProductController@addComment');

$router->get(path: '/login', action: 'App\Controllers\AuthController@index');
$router->post(path: '/login', action: 'App\Controllers\AuthController@login');

$router->get(path: '/logout', action: 'App\Controllers\AuthController@logout');

try {
    $router->resolve();
} catch (NotFoundException $e) {
    $e->error404();
}
