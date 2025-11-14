<?php

namespace App\Domaine\CarAds\UseCases;

use App\Domaine\Garage\Entities\Company;
use App\Domaine\CarAds\UseCases\UpdateCompanyDatasInterface;
use App\Domaine\Garage\Repositories\CompanyRepositoryInterface;

final class UpdateCompanyDatas implements UpdateCompanyDatasInterface

{

  public function __construct(
    private readonly CompanyRepositoryInterface $companyRepo
  ) {}
  public function __invoke(CompanyDatasDTO $companyDTO): Company
  {
    $company = $this->companyRepo->findCompanyDatas();

    if ($company->getName() !== $companyDTO->getName()) {
      $company->setName($companyDTO->getName());
    }
    
    if ($company->getAddress() !== $companyDTO->getAddress()) {
      $company->setAddress($companyDTO->getAddress());
    }
    
    if ($company->getZipCode() !== $companyDTO->getZipCode()) {
      $company->setZipCode($companyDTO->getZipCode());
    }

    if ($company->getCity() !== $companyDTO->getCity()) {
      $company->setCity($companyDTO->getCity());
    }
    
    if ($company->getPhone() !== $companyDTO->getPhone()) {
      $company->setPhone($companyDTO->getPhone());
    }
    
    if ($company->getEmail() !== $companyDTO->getEmail()) {
      $company->setEmail($companyDTO->getEmail());
    }

    $this->companyRepo->save($company);

    return $company;
  }
}
