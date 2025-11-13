<?php

namespace App\Application;


use ReflectionMethod;
use App\Application\Container;
use App\Application\NotFoundController;
use App\Domaine\CarAds\Controllers\CarController;
use App\Domaine\Garage\Controllers\HomeController;
use App\Domaine\CarAds\AdminController;
use App\Domaine\Contact\Controllers\ContactController;

// define('ROOT_DIR', __DIR__ . '/../../');
// define('UPLOADS_DIR', ROOT_DIR . 'public/uploads');

final class Router
{
    /**
     * Define the routes of the application
     * @var array $routes the routes of the application
     */
    private array $routes = [
        '/' => [HomeController::class, 'index'],
        '/nos-vehicules' => [CarController::class, 'index'],
        '/nos-vehicules/{id}' => [CarController::class, 'carDetails'],
        '/nous-contacter' => [ContactController::class, 'index'],
        '/admin' => [AdminController::class, 'index'],
    ];

    /**
     * Get the current URI
     * @return string $uri the current URI
     */
    private function getUri(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        return $uri === '/' ? $uri : rtrim($uri, '/');
    }

    /**
     * Dispatch the route from current URI
     * @return void
     */
    public function routeDispatch(): void
    {
        $uri = $this->getUri();
        $matchedRoute = null;
        $params = [];

        // 1. Itérer sur toutes les routes définies
        foreach ($this->routes as $routePattern => $routeAction) {
            $regex = preg_replace('#\{(\w+)\}#', '(?P<\1>[^/]+)', $routePattern);
            $regex = '#^' . $regex . '$#';

            if (preg_match($regex, $uri, $matches)) {
                $matchedRoute = $routeAction;

                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                break;
            }
        }

        $route = $matchedRoute ?? [NotFoundController::class, 'index'];

        [$controllerClass, $method] = $route;

        // Si la route trouvée est le 404, on ne passe pas les paramètres
        if ($controllerClass === NotFoundController::class) {
            $controller = Container::getClass($controllerClass);
            $controller->$method();
            return;
        }

        $controller = Container::getClass($controllerClass);

        $methodResolver = new ReflectionMethod($controllerClass, $method);
        $methodArgs = [];
        foreach ($params as $paramValue) {
            $methodArgs[] = $paramValue;
        }

        foreach ($methodResolver->getParameters() as $param) {
            $paramName = $param->getName();

            if (!isset($params[$paramName])) {
                $type = $param->getType()?->getName();

                if (!$type) {
                    throw new \Exception("Cannot autowire method parameter '{$param->getName()}' in {$controllerClass}::{$method}. Ensure all method parameters are typed (class/interface).");
                }

                $methodArgs[] = Container::getClass($type);
            }
        }

        $controller->$method(...$methodArgs);
    }
}
