<?php

namespace App\Application;

use PDO;
use App\Application\SessionInterface;


abstract class AbstractRepository
{
    protected string $table;

    public function __construct(
        protected readonly PDO $pdo,
        protected readonly SessionInterface $session
    ) {
        $this->session->setSession();
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
        return $datas;
    }

    /**
     * find one item by its id
     * @param int $id id of the item
     * @return array|null datas of the item or null if not found
     */
    public function findOneById(int $id)
    {
        $request = "SELECT * FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->pdo->prepare($request);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);

        return $datas;
    }
}
