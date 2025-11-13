<?php

namespace App\Domaine\Garage\Entities;

use App\Application\Traits\CreatedUpdatedTrait;

final class Opening
{
    use CreatedUpdatedTrait;

    private ?int $id = null;
    private string $day;
    private string $openTime;
    private string $closureTime;
    private Company $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setDay(string $day): static
    {
        $this->day = $day;
        return $this;
    }
    public function getDay(): string
    {
        return $this->day;
    }
    public function setOpenTime(string $openTime): static
    {
        $this->openTime = $openTime;
        return $this;
    }
    public function getOpenTime(): string
    {
        return $this->openTime;
    }
    public function setClosureTime(string $closureTime): static
    {
        $this->closureTime = $closureTime;
        return $this;
    }
    public function getClosureTime(): string
    {
        return $this->closureTime;
    }

    public function setCompany(Company $company): static
    {
        $this->company = $company;
        return $this;
    }
    public function getCompany(): Company
    {
        return $this->company;
    }
}
