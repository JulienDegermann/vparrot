<?php

namespace App\Domaine\UserManagement\UseCases;

use App\Domaine\UserManagement\Entity\User;
use App\Domaine\UserManagement\Repositories\UserRepositoryInterface;
use InvalidArgumentException;
use RuntimeException;

final class CreateUser implements CreateUserInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $repo
    ) {}

    /**
     * Create a new User
     * @param string $firstName User's first name
     * @param string $lastName User's last name
     * @param string $email User's email
     * @param string $role User's role
     * @param string $phone User's phone
     */
    public function __invoke(
        CreateUserDTO $userDTO
    ): User {
        $user = new User();
        $user
            ->setFirstName($userDTO->getFirstName())
            ->setLastName($userDTO->getLastName())
            ->setEmail($userDTO->getEmail())
            ->setRole($userDTO->getRole())
            ->setPhone($userDTO->getPhone() ?? null);

        if ($this->repo->findOneByEmail($user->getEmail())) {
            throw new InvalidArgumentException('ERROR : Cannot create an user with this e-mail.');
        }

        if (!$this->repo->save($user)) {
            throw new RuntimeException('ERROR : user could not be saved in database.');
        }

        return $user;
    }
}
