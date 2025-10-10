<?php

namespace App\Domaine\UserManagement\UseCases;

final class CreateUserDTO
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $email,
        private ?string $phone
    ) {}

    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getRole(): string
    {
        return "ROLE_USER";
    }
}
