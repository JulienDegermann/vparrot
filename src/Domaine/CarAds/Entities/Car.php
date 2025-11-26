<?php

use App\Application\Traits\CreatedUpdatedTrait;
use Application\Domain\CarAds\Entities\CarBrand;

final class Car
{
    use CreatedUpdatedTrait;

    private int $id;
    private CarBrand $carBrand;
    private CarModel $carModel;
    private int $mileage;
    private int $year;
    private int $price;
    private CarEnergy $carEnergy;
    private ?string $description;


    public function getId(): int
    {
        return $this->id;
    }
    public function getCarBrand(): CarBrand
    {
        return $this->carBrand;
    }
    public function setCarBrand(CarBrand $carBrand): static
    {
        $this->carBrand = $carBrand;
        return $this;
    }
    public function getCarModel(): CarModel
    {
        return $this->carModel;
    }
    public function getMileage(): int
    {
        return $this->mileage;
    }
    public function getYear(): int
    {
        return $this->year;
    }
    public function getPrice(): int
    {
        return $this->price;
    }
    public function getEnergy(): CarEnergy
    {
        return $this->carEnergy;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function __construct(?int $id = null)
    {
        $this->id = $id ?? null;
    }
}
