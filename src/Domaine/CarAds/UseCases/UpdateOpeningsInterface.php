<?php

namespace App\Domaine\CarAds\UseCases;

interface UpdateOpeningsInterface
{
  public function __invoke(UpdateOpeningsDTO $updateOpeningsDTO): array;
}
