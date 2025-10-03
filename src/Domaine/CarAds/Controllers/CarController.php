<?php

namespace App\Domaine\CarAds\Controllers;

use App\Application\AbstractController;

final class CarController extends AbstractController
{
    public function index()
    {
        $cars = [];

        // create an array with fake data for cars
        for ($i = 0; $i < 5; $i++) {
            $cars[] = [
                'id' => $i + 1,
                'brand' => 'Brand erezr ' . ($i + 1),
                'model' => 'Model ' . ($i + 1),
                'price' => rand(10000, 50000),
                'mileage' => rand(5000, 200000),
                'year' => rand(2000, 2023),
                'description' => 'This is a description for car ' . ($i + 1) . '.',
            ];
        }

        $this->render(__DIR__ . '/../templates/cars.php', [
            'cars' => $cars
        ]);
    }
}
