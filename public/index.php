<?php
require_once __DIR__ . '/../config/autoload.php';
include_once __DIR__ . '/../config/DataBase/DatabaseConnect.php';
include_once __DIR__ . '/../src/Application/Container.php';


use App\Application\Router;
use App\Application\Session;
use App\Application\Container;

define('ROOT_DIR', __DIR__ . '/../');
define('UPLOADS_DIR', '/uploads');

Session::setSession();

$router = Container::getClass(Router::class);
$router->routeDispatch();
