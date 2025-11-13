<?php

namespace App\Domaine\Garage\Repositories;

use App\Domaine\Garage\Entities\Company;

interface CompanyRepositoryInterface
{
    public function findAll(): ?array;
    public function findOneById(int $id): ?object;
    public function findCompanyDatas(): ?Company;
    public function save(Company $company): bool;
}
