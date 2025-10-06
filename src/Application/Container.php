<?php

namespace App\Application;

use PDO;
use ReflectionClass;
use InvalidArgumentException;
use App\Application\InterfaceBinding;
use App\Config\DataBase\DatabaseConnect;

final class Container
{
    /**
     * matches interfaces to corresponding classes
     * @param string $interface namespace of the interface
     * @return string $class corresponding class
     */
    private static function interfaceBinding(string $interface): string
    {
        $binding = InterfaceBinding::getBindings();
        $class = $binding[$interface] ?? null;
        if (!$class) {
            throw new InvalidArgumentException("ERROR : corresponding class for $interface not found");
        }

        return $class;
    }

    /**
     * Get class for dependency injection
     * @param string $class namespace of the class to inject
     * @return object 
     */
    public static function getClass(string $class): object
    {
        if ($class === PDO::class) {
            return (new DatabaseConnect())->connect();
        }

        if (interface_exists($class)) {
            $class = self::interfaceBinding($class);
        }

        if (!class_exists($class)) {
            throw new InvalidArgumentException("ERROR : Class $class not found");
        }

        $reflexion = new ReflectionClass($class);
        $constructor = $reflexion->getConstructor();

        if (!$constructor) {
            return new $class();
        };

        $args = [];

        foreach ($constructor->getParameters() as $params) {
            $type = $params->getType()?->getName();
            if (!$type) {
                throw new \Exception("Type not found for class $class");
            }
            $args[] = self::getClass($type);
        }

        return $reflexion->newInstanceArgs($args);
    }
}
