<?php

namespace Domaine\CarAds\Repositories;

use Car;
use PDO;
use App\Application\AbstractRepository;

final class CarBrandRepository extends AbstractRepository
{
    protected string $table = 'car_brands';

    /**
     * Save the current Car in the database
     * @param Car $datas datas Car to save in database
     * @return void
     */
    public function save(Car $datas): void
    {

        $sql = "INSERT INTO " . $this->table;
        $sql .= " (brand) VALUES (:brand)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':brand', $datas->getCarBrand(), \PDO::PARAM_STR);
        $stmt->execute();
        $stmt = null;
    }
}
