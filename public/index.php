<?php
require_once __DIR__ . '/../config/autoload.php';
include_once __DIR__ . '/../config/DataBase/DatabaseConnect.php';
include_once __DIR__ . '/../src/Application/Container.php';


use App\Application\Router;
use App\Application\Container;
use App\Config\DataBase\DatabaseConnect;


$router = Container::getClass(Router::class);
$router->routeDispatch();
// DatabaseConnect::connect();