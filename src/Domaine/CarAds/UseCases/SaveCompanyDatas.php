<?php

namespace App\Domaine\CarAds\UseCases;

use App\Domaine\Garage\Repositories\CompanyRepositoryInterface;

final class SaveCompanyDatas
{
  public function __construct(
    private readonly CompanyRepositoryInterface $companyRepo
  ) {}

  public function __invoke(CompanyDatasDTO $companyDTO): void
  {
    $company = $this->companyRepo->findOneById(1);

    $company->setName($companyDTO->name);
    $company->setAddress($companyDTO->address);
    $company->setZipCode($companyDTO->zipCode);
    $company->setPhone($companyDTO->phone);
    $company->setEmail($companyDTO->email);
    foreach ($companyDTO->openings as $opening) {
      $company->setOpenings($opening);
    }

    $this->companyRepo->save($company);
  }
}
