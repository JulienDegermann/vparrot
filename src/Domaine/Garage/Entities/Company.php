<?php

namespace App\Domaine\Garage\Entities;

use App\Application\Traits\CreatedUpdatedTrait;

final class Company
{
    use CreatedUpdatedTrait;

    private int $id;
    private string $name;
    private string $phone;
    private string $address;
    private string $siret;
    private string $city;
    private int $zipCode;
    private ?string $email = null;
    private ?array $openings = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setSiret(string $siret): static
    {
        $this->siret = $siret;
        return $this;
    }

    public function getSiret(): string
    {
        return $this->siret;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setZipCode(int $zipCode): static
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getZipCode(): int
    {
        return $this->zipCode;
    }

    public function addOpening(Opening $opening): static
    {
        $this->openings[] = $opening;

        return $this;
    }

    public function removeOpening(Opening $opening): static
    {
        // remove Opening from $this->openings
        return $this;
    }

    public function getOpenings(): array
    {
        return $this->openings;
    }

    public function setOpenings(Opening $opening): static
    {
        $this->openings[] = $opening;
        return $this;
    }
}
