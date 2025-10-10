<?php

namespace App\Domaine\Contact\UseCase\SendMessage;

use App\Domaine\Contact\Entity\Message;
use App\Domaine\UserManagement\Entity\User;
use App\Domaine\UserManagement\UseCases\CreateUserDTO;
use App\Domaine\Contact\UseCase\SendMessage\SendMessageDTO;
use App\Domaine\UserManagement\UseCases\CreateUserInterface;
use App\Domaine\Contact\Repositories\MessageRepositoryInterface;
use App\Domaine\UserManagement\Repositories\UserRepositoryInterface;
use DateTimeImmutable;

final class SendMessage implements SendMessageInterface
{
    public function __construct(
        private readonly MessageRepositoryInterface $messageRepo,
        private readonly UserRepositoryInterface $userRepo,
        private readonly CreateUserInterface $createUser
    ) {}

    public function __invoke(SendMessageDTO $messageDTO): void
    {
        $user = $this->userRepo->findOneByEmail($messageDTO->getEmail()) ?? null;

        if ($user === null) {
            $userDTO = new CreateUserDTO(
                $messageDTO->getFirstName(),
                $messageDTO->getLastName(),
                $messageDTO->getEmail(),
                $messageDTO->getPhone() ?? null
            );
            $user = ($this->createUser)($userDTO);
        }

        $message = new Message();
        $message->setAuthor($user)
            ->setContent($messageDTO->getMessage())
            ->setStatus('new');

        $this->messageRepo->save($message);
    }
}
