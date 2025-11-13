<?php

namespace App\Domaine\CarAds\UseCases;

use App\Domaine\Garage\Entities\Company;
use App\Domaine\Garage\Entities\Opening;
use SessionUpdateTimestampHandlerInterface;
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

    if ($company->getPhone() !== $companyDTO->getPhone()) {
      $company->setPhone($companyDTO->getPhone());
    }

    if ($company->getEmail() !== $companyDTO->getEmail()) {
      $company->setEmail($companyDTO->getEmail());
    }

    // $openings = [];
    // for ($i = 0; $i < count($companyDTO->getOpenings()); $i++) {
    //   $current = new Opening();
    //   $current->setDay($companyDTO->getOpenings()['day'][$i]);
    //   $current->setOpenTime($companyDTO->getOpenings()['openTime'][$i]);
    //   $current->setClosureTime($companyDTO->getOpenings()['closureTime'][$i]);


    //   // if (!in_array($current, $company->getOpenings())) {
    //   // est-ce que ça compare bien les objets ? si le nouveau n'a pas d'id il est différent de tous les autres ?
    //   // $company->setOpenings($current);
    //   // }

    //   $openings[] = $current;

    //   $company->addOpening($current);
    // }


    $this->companyRepo->save($company);

    return $company;
  }
}
