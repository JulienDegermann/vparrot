<?php

namespace Application\Domain\CarAds\Entities;

final class CarBrand
{
    private int $id;
    private string $brand;

    public function getId(): int
    {
        return $this->id;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
}