<?php

namespace App\Domaine\Contact\UseCase\SendMessage;

use App\Domaine\Contact\UseCase\SendMessage\SendMessageDTO;

interface SendMessageInterface
{
    public function __invoke(SendMessageDTO $messageDTO): void;
}
