<?php

namespace Domaine\CarAds\Entities;

final class CarModel
{
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
