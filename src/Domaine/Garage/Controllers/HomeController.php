<?php

namespace App\Domaine\Garage\Controllers;

use App\Application\AbstractController;
use App\Domaine\CarAds\Interfaces\CarRepositoryInterface;

final class HomeController extends AbstractController
{
    public function index(
        CarRepositoryInterface $carRepository
    ) {

        $cars = $carRepository->findAll();
        $this->render(__DIR__ . '/../templates/home.php');
    }
}
