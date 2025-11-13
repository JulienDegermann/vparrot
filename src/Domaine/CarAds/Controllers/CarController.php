<?php

namespace App\Domaine\CarAds\Controllers;

use App\Application\AbstractController;
use App\Domaine\CarAds\Interfaces\CarRepositoryInterface;

final class CarController extends AbstractController
{
    public function __construct(
        private readonly CarRepositoryInterface $repo
    ) {}



    public function index()
    {
        $cars = $this->repo->findAll();


        /**
         * @var $cars fake datas (to delete)
         */
        $cars = [
            [
                'brand' => "brand-1",
                'model' => "model-1",
            ],
            [
                'brand' => "brand-2",
                'model' => "model-2",
            ],
            [
                'brand' => "brand-3",
                'model' => "model-3",
            ],
            [
                'brand' => "brand-4",
                'model' => "model-4",
            ],
        ];

        $content = __DIR__ . '/../templates/cars.php';

        $this->render([
            'content' => $content,
            'cars' => $cars
        ]);
    }


    public function carDetails(int $id)
    {
        $car = $this->repo->findOneById($id) ?? null;

        // if (!$car) {
        //     $this->addFlash('error', 'erreur de redirection');
        //     $this->redirectToUri('/');
        // }

        $car = [
            'brand' => "brand-1",
            'model' => "model-1",
            'mileage' => 20000,
            'year' => 2020,
            'price' => 20000,
            'images' => [
                '2VolkswagenGolf0.jpeg'
            ]
        ];

        $content = __DIR__ . '/../templates/car_details.php';

        $this->render([
            'content' => $content,
            'car' => $car
        ]);
    }
}
