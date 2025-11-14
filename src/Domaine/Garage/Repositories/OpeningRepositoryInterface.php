<?php

namespace App\Domaine\Garage\Repositories;

interface OpeningRepositoryInterface
{
    public function findAll(): ?array;
    public function save(array $openings): array;
}
