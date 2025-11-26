<?php

namespace App\Domaine\CarAds\UseCases;

interface UpdateServicesInterface
{
  public function __invoke(UpdateServicesDTO $dto): array;
}
