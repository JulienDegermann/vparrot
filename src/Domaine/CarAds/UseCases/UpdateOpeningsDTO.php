<?php

namespace App\Domaine\CarAds\UseCases;

final class UpdateOpeningsDTO
{
  public function __construct(
    private readonly array $openings,
  ) {}

  public function getOpenings(): array
  {
    return $this->openings;
  }
}
