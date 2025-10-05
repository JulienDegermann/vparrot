<?php

namespace App\Application;

use ReflectionMethod;

use App\Application\Container;
use App\Application\NotFoundController;
use App\Domaine\CarAds\Controllers\CarController;
use App\Domaine\Garage\Controllers\HomeController;

define('ROOT_DIR', __DIR__ . '/../../');

final class Router
{
    /**
     * Define the routes of the application
     * @var array $routes the routes of the application
     */
    private array $routes = [
        '/' => [HomeController::class, 'index'],
        '/nos-vehicules' => [CarController::class, 'index'],
        // 'nous-contacter' => ContactController::class,
    ];

    /**
     * Get the current URI
     * @return string $uri the current URI
     */
    private function getUri(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return $uri;
    }

    /**
     * Dispatch the route from current URI
     * @return void
     */
    public function routeDispatch(): void
    {
        $route = $this->routes[$this->getUri()] ?? [NotFoundController::class, 'index'];
        [$controllerClass, $method] = $route;

        $controller = Container::getClass($controllerClass);

        $methodResolver = new ReflectionMethod($controllerClass, $method);
        $methodArgs = [];

        foreach ($methodResolver->getParameters() as $param) {
            $type = $param->getType()?->getName();

            if (!$type) {

                throw new \Exception("Cannot autowire method parameter '{$param->getName()}' in {$controllerClass}::{$method}. Ensure all method parameters are typed (class/interface).");
            }

            $methodArgs[] = Container::getClass($type);
        }

        $controller->$method(...$methodArgs);
    }
}
