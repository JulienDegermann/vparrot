<?php

use App\Application\Traits\CreatedUpdatedTrait;


final class CarEnergy
{
    use CreatedUpdatedTrait;

    private int $id;
    private string $energy;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): static
    {
        $this->energy = $energy;
        return $this;
    }

    public function __construct(?int $id = null)
    {
        $this->id = $id ?? null;
    }
}
