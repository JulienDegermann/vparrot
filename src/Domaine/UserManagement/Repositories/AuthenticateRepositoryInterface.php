<?php

namespace App\Domaine\UserManagement\Repositories;

use App\Domaine\UserManagement\Entity\Authenticate;

interface AuthenticateRepositoryInterface
{
    public function findUserByEmail(string $email): ?array;
    public function save(Authenticate $user): bool;
}
