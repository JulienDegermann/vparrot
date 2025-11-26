<?php

namespace Application\Domain\CarAds\Entities;

use App\Application\Traits\CreatedUpdatedTrait;

final class CarBrand
{
    use CreatedUpdatedTrait;

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

    public function __construct(?int $id = null)
    {
        $this->id = $id ?? null;
    }
}
