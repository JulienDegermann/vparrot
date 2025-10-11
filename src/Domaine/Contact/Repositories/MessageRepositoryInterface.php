<?php

namespace App\Domaine\Contact\Repositories;

use App\Domaine\Contact\Entity\Message;



interface MessageRepositoryInterface
{
    public function findAllByAuthor(string $email): ?array;

    public function save(Message $message): bool;
}
