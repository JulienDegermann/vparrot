<?php

namespace App\Application;

use DateTimeImmutable;
use PDO;

abstract class AbstractRepository
{
    /**
     * @var string $table name of corresponding table in database
     */
    protected string $table = "";

    /**
     * @var string[] $fields array containing each column of database
     */
    protected array $fields = [];

    /**
     * @var array $getters array of Entity's getters
     */
    protected array $getters = [];

    /**
     * @var string $entity corresponding Entity
     */
    protected string $entity = '';

    /**
     * Hydrate entity with datas from database
     * @param array $datas datas recieved from database
     * @return object hydrated entity
     */
    protected function hydrate(array $datas, ?string $entityClass = null): object|null
    {
        $entity = $entityClass ?? $this->entity;

        if ($entityClass !== "") {
            $entity = new $entity($datas['id']);

            foreach ($datas as $column => $data) {
                if ($column !== 'id') {
                    if ($column === "createdAt" || $column === "updatedAt") {
                        $value = new DateTimeImmutable($data);
                    } else {
                        $value = $data ?? null;
                    }

                    $setter = "set" . ucfirst($column);
                    $entity->$setter($value);
                }
            }

            return $entity;
        }
        return null;
    }

    public function __construct(
        protected readonly PDO $pdo
    ) {
        foreach ($this->fields as $field) {

            $this->getters[$field] = "get" . ucfirst($field);
        }
    }

    /**
     * find all items from the table
     * @return array|null items with of the item or null if not found
     */
    public function findAll(): array
    {
        $request = "SELECT * FROM " . $this->table;
        $stmt = $this->pdo->prepare($request);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        $result = [];

        if (count($datas) > 0) {
            foreach ($datas as $data) {
                $entity = $this->hydrate($data);
                $result[] = $entity;
            }
        }
        return $result;
    }

    /**
     * find one item by its id
     * @param int $id id of the item
     * @return array|null datas of the item or null if not found
     */
    public function findOneById(int $id): ?object
    {
        $request = "SELECT * FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        $result = $datas ? $this->hydrate($datas) : null;

        return $result;
    }
}
