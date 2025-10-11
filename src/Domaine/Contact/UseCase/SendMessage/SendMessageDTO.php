<?php

namespace App\Domaine\Contact\UseCase\SendMessage;

final class SendMessageDTO implements SendMessageDTOInterface
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $email,
        private string $phone,
        private string $message,
    ) {}

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }


    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}
