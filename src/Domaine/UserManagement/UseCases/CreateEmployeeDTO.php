<?php

namespace App\Domaine\UserManagement\UseCases;

final class CreateEmployeeDTO
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private ?string $phone = null
    ) {}

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }
}
