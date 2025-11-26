<?php

namespace App\Domaine\Garage\Repositories;

use PDO;
use App\Application\AbstractRepository;
use App\Domaine\Garage\Entities\Service;

final class ServiceRepository extends AbstractRepository implements ServiceRepositoryInterface
{
  protected string $entity = Service::class;
  protected string $table = 'services';
  protected array $fields = [
    'id',
    'name',
    'description',
    'createdAt',
    'updatedAt'
  ];

  public function save(array $services): void
  {
    $sql = "UPDATE {$this->table} SET 
    name = :name,
    description = :description WHERE
    id = :id;";
    $stmt = $this->pdo->prepare($sql);

    foreach ($services as $service) {
      $id = intval($service->getId());
      $name = $service->getName();
      $description = $service->getDescription();

      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':description', $description, PDO::PARAM_STR);
      $stmt->execute();
    }

    $stmt = null;;
  }
}
