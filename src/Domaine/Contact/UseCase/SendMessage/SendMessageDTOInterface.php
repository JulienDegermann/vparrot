<?php

namespace App\Domaine\Contact\UseCase\SendMessage;

interface SendMessageDTOInterface
{
    public function getFirstName(): string;
    public function getLastName(): string;
    public function getEmail(): string;
    public function getPhone(): string;
    public function getMessage(): string;
}
