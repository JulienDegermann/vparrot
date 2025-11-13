<?php

namespace App\Domaine\CarAds\UseCases;

use App\Domaine\Garage\Entities\Company;

interface UpdateCompanyDatasInterface
{
  public function __invoke(CompanyDatasDTO $companyDTO): Company;
}
