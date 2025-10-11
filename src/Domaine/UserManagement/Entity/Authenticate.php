<?php

namespace App\Domaine\UserManagement\Entity;

use App\Application\Traits\CreatedUpdatedTrait;

final class Authenticate
{
    use CreatedUpdatedTrait;
    
    /**
     * @var ?int $id
     */
    private ?int $id;

    /**
     * @var string $password 
     */
    private string $password;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @return int $id User's id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $password User's password
     * @return static
     */
    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return ?string User's password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param User $user User
     * @return static
     */
    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return ?User User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }
}
