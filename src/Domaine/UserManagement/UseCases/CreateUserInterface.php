<?php

namespace App\Domaine\UserManagement\UseCases;

use App\Domaine\UserManagement\Entity\User;

interface CreateUserInterface
{
    public function __invoke(CreateUserDTO $createUserDTO): User;
}
