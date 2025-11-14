<?php

namespace App\Domaine\CarAds\UseCases;

use App\Domaine\Garage\Entities\Opening;
use App\Domaine\Garage\Repositories\CompanyRepositoryInterface;
use App\Domaine\Garage\Repositories\OpeningRepositoryInterface;


final class UpdateOpenings implements UpdateOpeningsInterface
{

  public function __construct(
    private readonly OpeningRepositoryInterface $openingRepository,
    private readonly CompanyRepositoryInterface $companyRepository
  ) {}

  public function __invoke(UpdateOpeningsDTO $updateOpeningsDTO): array
  {

    $openings = [];

    foreach ($updateOpeningsDTO->getOpenings() as $opening) {

      $current = new Opening();
      $current->setDay($opening['day']);
      $current->setOpenTime($opening['open_time']);
      $current->setClosureTime($opening['closure_time']);
      $openings[] = $current;
    }

    $this->openingRepository->save($openings);



    return $openings;
  }
}
