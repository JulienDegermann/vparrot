<?php

namespace App\Domaine\Garage\Repositories;

interface ServiceRepositoryInterface
{
  public function findAll(): ?array;
  public function save(array $services): void;
}
