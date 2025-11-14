<?php

namespace App\Domaine\Garage\Repositories;

use PDO;
use App\Application\AbstractRepository;
use App\Domaine\Garage\Entities\Opening;

final class OpeningRepository extends AbstractRepository implements OpeningRepositoryInterface
{
  protected string $entity = Opening::class;
  protected string $table = 'openings';
  protected array $fields = [
    'id',
    'day',
    'openTime',
    'closureTime',
    'createdAt',
    'updatedAt'
  ];

  public function save(array $openings): array
  {

    $sql = "DELETE FROM {$this->table};";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $stmt = null;

    $sql = "INSERT INTO {$this->table}
        (day, openTime, closureTime, company) VALUES
        (:day, :openTime, :closureTime, 1)
                ON DUPLICATE KEY UPDATE 
                    openTime = VALUES(openTime), 
                    closureTime = VALUES(closureTime), 
                    updatedAt = VALUES(updatedAt)";

    $stmt = $this->pdo->prepare($sql);

    $result = [];

    foreach ($openings as $opening) {

      $day = $opening->getDay();
      $openTime = $opening->getOpenTime();
      $closureTime = $opening->getClosureTime();

      $stmt->bindValue(':day', $day, PDO::PARAM_STR);
      $stmt->bindValue(':openTime', $openTime, PDO::PARAM_STR);
      $stmt->bindValue(':closureTime', $closureTime, PDO::PARAM_STR);
      $result[] = $stmt->execute();
    }


    $stmt = null;

    return $result;
  }
}
