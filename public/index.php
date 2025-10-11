<?php
require_once __DIR__ . '/../config/autoload.php';
include_once __DIR__ . '/../config/DataBase/DatabaseConnect.php';
include_once __DIR__ . '/../src/Application/Container.php';
include_once __DIR__ . './../config/constantes.php';


use App\Application\Router;
use App\Application\Session;
use App\Application\Container;



Session::setSession();

$router = Container::getClass(Router::class);
$router->routeDispatch();
