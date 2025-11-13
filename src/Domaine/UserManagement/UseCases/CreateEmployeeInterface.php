<?php

namespace App\Domaine\UserManagement\UseCases;

use App\Domaine\UserManagement\Entity\User;
use App\Domaine\UserManagement\UseCases\CreateEmployeeDTO;

interface CreateEmployeeInterface
{
    public function __invoke(CreateEmployeeDTO $createUserDTO): User;
}
