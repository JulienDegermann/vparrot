<?php

namespace App\Domaine\UserManagement\Repositories;


use PDO;
use App\Application\AbstractRepository;
use App\Domaine\UserManagement\Entity\Authenticate;
use App\Domaine\UserManagement\Repositories\AuthenticateRepositoryInterface;

final class AuthenticateRepository extends AbstractRepository implements AuthenticateRepositoryInterface
{
    protected string $table = 'authenticates';

    protected array $fields = [
        'id',
        'password',
        'createdAt',
        'updatedAt',
        'user'
    ];


    public function findUserByEmail(string $email): ?array
    {
        $sql = "SELECT u.*, a.password  FROM $this->table a
        JOIN users u ON a.userId = u.id
        WHERE u.email = :email;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;

        return $result;
    }

    /**
     * @param User $user user to save in database
     * @return bool
     */
    public function save(Authenticate $authenticate): bool
    {
        return true;
        // $params = [];
        // if ($user->getId()) {
        //     $sql = "UPDATE $this->table SET ";
        //     foreach ($this->getters as $column => $getter) {
        //         if ($user->$getter() !== null && $column !== "id") {
        //             $params[":$column"] = "$column = :$column";
        //         }
        //     }

        //     $sql .= implode(', ', $params);
        //     $sql .= " WHERE id = :id;";
        // } else {
        //     $sql = "INSERT INTO $this->table (";
        //     foreach ($this->getters as $column => $getter) {
        //         if ($user->$getter() !== null) {
        //             $params[":$column"] = $column;
        //         }
        //     }
        //     $sql .= implode(', ', $params) . ") VALUES (";
        //     $sql .= implode(', ', array_keys($params)) . ");";
        // }

        // $stmt = $this->pdo->prepare($sql);

        // foreach ($params as $param => $column) {
        //     $getter = ($this->getters)[ltrim($param, ":")] ? ($this->getters)[ltrim($param, ":")] : null;
        //     $value = $user->$getter();
        //     $stmt->bindValue($param, $value, PDO::PARAM_STR);
        // }

        // $result = $stmt->execute();
        // $stmt = null;

        // return $result;
    }
}
