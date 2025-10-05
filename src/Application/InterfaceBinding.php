<?php

namespace App\Application;

use App\Application\Session;
use App\Application\SessionInterface;
use App\Domaine\CarAds\Repositories\CarRepository;
use App\Domaine\CarAds\Interfaces\CarRepositoryInterface;

final class InterfaceBinding
{


    /**
     * @var array $binding interface => class matches list
     */
    private static array $binding = [
        CarRepositoryInterface::class => CarRepository::class,
        SessionInterface::class => Session::class
    ];


    /**
     * get matches between interfaces and classes
     * @return array interface class binding array
     */
    public static function getBindings(): array
    {
        return self::$binding;
    }
}
