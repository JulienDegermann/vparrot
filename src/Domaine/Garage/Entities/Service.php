<?php

namespace App\Domaine\Garage\Entities;

use App\Application\Traits\CreatedUpdatedTrait;

final class Service
{
  use CreatedUpdatedTrait;

  private int $id;
  private string $name;
  private string $description;

  public function getId(): int
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): static
  {
    $this->name = $name;
    return $this;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function setDescription(string $description): static
  {
    $this->description = $description;
    return $this;
  }

  public function __construct(?int $id = null)
  {
    $this->id = $id ?? null;
  }
}
