<?php

namespace App\Domaine\Contact\Repositories;

use PDO;

use App\Application\AbstractRepository;
use App\Domaine\Contact\Entity\Message;

final class MessageRepository extends AbstractRepository implements MessageRepositoryInterface
{
    protected string $table = 'messages';

    protected array $fields = [
        'id',
        'author',
        'content',
        'status',
        // 'createdAt',
        // 'updatedAt'
    ];

    public function findAllByAuthor(string $email): ?array
    {
        // update to find messages from a specific author
        $sql = "SELECT m.message FROM messages m
                JOIN users u ON m.user_id = u.id 
                WHERE u.email = :email;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * @param Message $message message to save in database
     * @return bool
     */
    public function save(Message $message): bool
    {
        // update message ?
        if ($message->getId()) {
            if ($message->getStatus() !== "new") {
                $status = $message->getStatus();
                $id = $message->getId();

                $sql = "UPDATE $this->table SET status = :status WHERE id = :id;";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(":status", $status, PDO::PARAM_STR);
                $stmt->bindValue(":id", $id, PDO::PARAM_INT);
                $result = $stmt->execute();
                $stmt = null;

                return $result;
            } else {
                throw new \RuntimeException('ERROR : no changes on status field observed.');
            }
        } else {
            $sql = "INSERT INTO $this->table (";
            $params = [];
            foreach ($this->getters as $column => $getter) {
                if ($message->$getter() !== null) {
                    $params[":$column"] = $column;
                }
            }
            $sql .= implode(', ', $params) . ") VALUES (";

            $sql .= implode(', ', array_keys($params)) . ");";

            $stmt = $this->pdo->prepare($sql);

            foreach ($params as $param => $column) {

                if ($column === "author") {
                    $value = $message->getAuthor()->getId() ?? $this->pdo->lastInsertId();
                } elseif ($column) {
                    $getter = ($this->getters)[$column] ?? null;
                    $value = $message->$getter();
                }
                $stmt->bindValue("$param", $value, $column === "id" ? PDO::PARAM_INT : \PDO::PARAM_STR);
            }

            $result = $stmt->execute();
            $stmt = null;

            return $result;
        }
    }
}
