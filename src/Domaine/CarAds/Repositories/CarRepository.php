<?php

namespace App\Domaine\CarAds\Repositories;

use App\Application\AbstractRepository;
use App\Domaine\CarAds\Interfaces\CarRepositoryInterface;
use Car;

final class CarRepository extends AbstractRepository implements CarRepositoryInterface
{
    protected string $table = 'cars';

    protected string $entity = Car::class;

    
}
