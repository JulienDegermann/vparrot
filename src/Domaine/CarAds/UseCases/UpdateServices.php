<?php

namespace App\Domaine\CarAds\UseCases;

use App\Domaine\Garage\Entities\Service;
use App\Domaine\CarAds\UseCases\UpdateServicesInterface;
use App\Domaine\Garage\Repositories\ServiceRepositoryInterface;

final class UpdateServices implements UpdateServicesInterface
{
  public function __construct(
    private readonly ServiceRepositoryInterface $servicesRepo
  ) {}

  public function __invoke(UpdateServicesDTO $dto): array
  {
    $datas = [];

    foreach ($dto->getServices() as $service) {
      $data = new Service($service['id']);

      $data->setName($service['name']);
      $data->setDescription($service['description']);

      $datas[] = $data;
    }
    
    $this->servicesRepo->save($datas);
    
    return $datas;
  }
}
