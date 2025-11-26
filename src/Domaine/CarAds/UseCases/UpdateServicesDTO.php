<?php

namespace App\Domaine\CarAds\UseCases;

final class UpdateServicesDTO
{
  public function __construct(
    private readonly array $services
  ) {}

  public function getServices(): array
  {
    return $this->services;
  }
}
