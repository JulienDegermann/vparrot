<?php

namespace App\Domaine\Garage\Controllers;

use App\Application\AbstractController;
use App\Domaine\CarAds\Interfaces\CarRepositoryInterface;
use App\Domaine\Garage\Repositories\CompanyRepositoryInterface;

final class HomeController extends AbstractController
{
    public function index(
        CarRepositoryInterface $carRepository,
        CompanyRepositoryInterface $companyRepository
    ) {
        $cars = $carRepository->findAll();
        $content = __DIR__ . './../templates/home.php';
        $company = $companyRepository->findCompanyDatas();

        $home = true;

        $this->render([
            'content' => $content,
            'cars' => $cars,
            'home' => $home,
            'company' => $company,
        ]);
    }
}
