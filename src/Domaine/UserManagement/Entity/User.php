<?php

namespace App\Domaine\UserManagement\Entity;

use App\Application\Traits\CreatedUpdatedTrait;
use DateTimeImmutable;

final class User
{
    use CreatedUpdatedTrait;

    public function __construct(
        ?int $id = null
    )
    {
        $this->id = $id ?? null;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
    }
    
    /**
     * @var ?int $id
     */
    private ?int $id = null;

    /**
     * @var string $firstName 
     */
    private string $firstName;

    /**
     * @var string $lastName 
     */
    private string $lastName;

    /**
     * @var string $email 
     */
    private string $email;

    /**
     * @var string $phone 
     */
    private string $phone;

    /**
     * @var string $role 
     */
    private string $role;

    /**
     * @return int $id User's id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $firstName User's first name
     * @return static
     */
    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return ?string User's first name or null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName User's last name
     * @return static
     */
    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return ?string User's last name or null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $phone User's phone
     * @return static
     */
    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return ?string User's phone or null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $email User's email
     * @return static
     */
    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return ?string User's last name or null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $role User's role
     * @return static
     */
    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return ?string User's role
     */
    public function getRole(): string
    {
        return $this->role;
    }
}
