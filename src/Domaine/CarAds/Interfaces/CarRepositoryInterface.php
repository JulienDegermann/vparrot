<?php

namespace App\Domaine\CarAds\Interfaces;

interface CarRepositoryInterface
{
    public function findAll(): array;
    public function findOneById(int $id);
}
