<?php

namespace App\Domaine\UserManagement\Repositories;


use PDO;
use App\Application\AbstractRepository;
use App\Domaine\UserManagement\Entity\User;
use App\Domaine\UserManagement\Repositories\UserRepositoryInterface;

final class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    protected string $table = 'users';

    protected string $entity = User::class;

    protected array $fields = [
        'id',
        'firstName',
        'lastName',
        'email',
        'role',
        'phone',
        // 'createdAt',
        // 'updatedAt'
    ];


    public function findOneByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email = :email;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);

        $result = $datas ? $this->hydrate($datas) : null;

        return $result;
    }

    public function findAllEmployees(): ?array
    {
        $role = "ROLE_EMPLOYEE";
        $sql = "SELECT * FROM users WHERE role = :role;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':role', $role, \PDO::PARAM_STR);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $result = [];

        foreach ($datas as $data) {
            $user  = $data ? $this->hydrate($data) : null;
            $result[] = $user;
        }

        return $result;
    }

    /**
     * @param User $user user to save in database
     * @return bool
     */
    public function save(User $user): bool
    {
        $params = [];
        if ($user->getId()) {
            $sql = "UPDATE $this->table SET ";
            foreach ($this->getters as $column => $getter) {
                if ($user->$getter() !== null && $column !== "id") {
                    $params[":$column"] = "$column = :$column";
                }
            }

            $sql .= implode(', ', $params);
            $sql .= " WHERE id = :id;";
        } else {
            $sql = "INSERT INTO $this->table (";
            foreach ($this->getters as $column => $getter) {
                if ($user->$getter() !== null) {
                    $params[":$column"] = $column;
                }
            }
            $sql .= implode(', ', $params) . ") VALUES (";
            $sql .= implode(', ', array_keys($params)) . ");";
        }

        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $param => $column) {
            $getter = ($this->getters)[ltrim($param, ":")] ? ($this->getters)[ltrim($param, ":")] : null;
            $value = $user->$getter();
            $stmt->bindValue($param, $value, PDO::PARAM_STR);
        }

        $result = $stmt->execute();
        $stmt = null;

        return $result;
    }
}
