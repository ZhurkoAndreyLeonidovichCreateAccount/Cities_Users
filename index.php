<?php
use System\Router;
include_once('init.php');
$router = new Router(BASE_URL);
$router->routes = include_once('System/routes.php');
$uri = $_SERVER['REQUEST_URI'];
$activeRoute = $router->resolvePath($uri);
$controller = $activeRoute['controller'];
$method = $activeRoute['method'];
$content = $controller::$method();
$html = template('main', ['content'=>$content]);
echo $html;