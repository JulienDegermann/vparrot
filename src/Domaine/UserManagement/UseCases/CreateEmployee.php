<?php

namespace App\Domaine\UserManagement\UseCases;

use RuntimeException;
use InvalidArgumentException;
use App\Domaine\UserManagement\Entity\User;
use App\Domaine\UserManagement\UseCases\CreateEmployeeDTO;
use App\Domaine\UserManagement\UseCases\CreateEmployeeInterface;
use App\Domaine\UserManagement\Repositories\UserRepositoryInterface;

final class CreateEmployee implements CreateEmployeeInterface
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
        CreateEmployeeDTO $userDTO
    ): User {

        if (strlen($userDTO->getFirstName()) < 2 || strlen($userDTO->getFirstName()) > 100) {
            throw new InvalidArgumentException('Prénom invalide.');
        }

        if (!preg_match(NAME_REGEX, $userDTO->getFirstName())) {
            throw new InvalidArgumentException('Prénom invalide.');
        }

        if (strlen($userDTO->getLastName()) < 2 || strlen($userDTO->getLastName()) > 100) {
            throw new InvalidArgumentException('Nom invalide.');
        }

        if (!preg_match(NAME_REGEX, $userDTO->getLastName())) {
            throw new InvalidArgumentException('Nom invalide.');
        }

        if ($userDTO->getPhone() !== null && !preg_match(PHONE_REGEX, $userDTO->getPhone())) {
            throw new InvalidArgumentException('Numéro de téléphone invalide.');
        }

        $email = iconv('UTF-8', 'ASCII//TRANSLIT', strtolower($userDTO->getFirstName() . "." . $userDTO->getLastName()));

        $user = new User();
        $user
            ->setFirstName($userDTO->getFirstName())
            ->setLastName($userDTO->getLastName())
            ->setEmail(strtolower($email . EMAIL_EXTENSION))
            ->setRole("ROLE_EMPLOYEE")
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
