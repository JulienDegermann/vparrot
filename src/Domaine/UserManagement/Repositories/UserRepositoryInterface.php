<?php

namespace App\Domaine\UserManagement\Repositories;

use App\Domaine\UserManagement\Entity\User;

interface UserRepositoryInterface
{
    public function findOneByEmail(string $email): ?User;
    public function save(User $user): bool;
}
