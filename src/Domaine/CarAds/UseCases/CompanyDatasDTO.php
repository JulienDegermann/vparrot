<?php

namespace App\Domaine\CarAds\UseCases;


final class CompanyDatasDTO
{
  public function __construct(
    private readonly string $name,
    private readonly string $address,
    private readonly string $zipCode,
    private readonly ?string $phone,
    private readonly ?string $email,
    private readonly array $openings
  ) {}


  public function getName(): string
  {
    return $this->name;
  }

  public function getAddress(): string
  {
    return $this->address;
  }

  public function getZipCode(): int
  {
    return $this->zipCode;
  }

  public function getPhone(): ?string
  {
    return $this->phone;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function getOpenings(): array
  {
    return $this->openings;
  }
}
