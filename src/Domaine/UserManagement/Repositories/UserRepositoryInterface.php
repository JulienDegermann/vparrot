<?php

namespace App\Domaine\UserManagement\Repositories;

use App\Domaine\UserManagement\Entity\User;

interface UserRepositoryInterface
{

    public function findAll(): array;
    public function findAllEmployees(): ?array;
    public function findOneByEmail(string $email): ?User;
    public function save(User $user): bool;
    
}
