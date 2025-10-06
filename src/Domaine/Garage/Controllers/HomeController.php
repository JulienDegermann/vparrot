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
        $content = __DIR__ . './../templates/home.php';

        $home = true;

        $this->render(ROOT_DIR . '/templates/base.php', [
            'content' => $content,
            'cars' => $cars,
            'home' => $home
        ]);
    }
}
