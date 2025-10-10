<?php

namespace Domaine\CarAds\Entities;

use App\Application\Traits\CreatedUpdatedTrait;

final class CarModel
{
    use CreatedUpdatedTrait;
    
    private int $id;
    private string $model;

    public function getId(): int
    {
        return $this->id;
    }
    public function getCarModel(): string
    {
        return $this->model;
    }

    public function setCarModel(string $model): static
    {
        $this->model = $model;
        return $this;
    }
}
