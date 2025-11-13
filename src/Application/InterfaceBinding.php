<?php

namespace App\Application;

use App\Domaine\CarAds\Repositories\CarRepository;
use App\Domaine\UserManagement\UseCases\CreateUser;
use App\Domaine\Contact\Repositories\MessageRepository;
use App\Domaine\UserManagement\UseCases\CreateEmployee;
use App\Domaine\Contact\UseCase\SendMessage\SendMessage;
use App\Domaine\CarAds\Interfaces\CarRepositoryInterface;
use App\Domaine\CarAds\UseCases\UpdateCompanyDatas;
use App\Domaine\CarAds\UseCases\UpdateCompanyDatasInterface;
use App\Domaine\UserManagement\Repositories\UserRepository;
use App\Domaine\UserManagement\UseCases\CreateUserInterface;
use App\Domaine\Contact\Repositories\MessageRepositoryInterface;
use App\Domaine\UserManagement\UseCases\CreateEmployeeInterface;
use App\Domaine\Contact\UseCase\SendMessage\SendMessageInterface;
use App\Domaine\Garage\Repositories\CompanyRepository;
use App\Domaine\Garage\Repositories\CompanyRepositoryInterface;
use App\Domaine\UserManagement\Repositories\AuthenticateRepository;
use App\Domaine\UserManagement\Repositories\UserRepositoryInterface;
use App\Domaine\UserManagement\Repositories\AuthenticateRepositoryInterface;

final class InterfaceBinding
{
    /**
     * @var array $binding interface => class matches list
     */
    private static array $binding = [
        CarRepositoryInterface::class => CarRepository::class,
        CarRepositoryInterface::class => CarRepository::class,
        MessageRepositoryInterface::class => MessageRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        SendMessageInterface::class => SendMessage::class,
        AuthenticateRepositoryInterface::class => AuthenticateRepository::class,
        CreateUserInterface::class => CreateUser::class,
        CreateEmployeeInterface::class => CreateEmployee::class,
        CompanyRepositoryInterface::class => CompanyRepository::class,
        UpdateCompanyDatasInterface::class => UpdateCompanyDatas::class,
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
