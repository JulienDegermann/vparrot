<?php

namespace App\Domaine\Contact\Controllers;

use Throwable;
use InvalidArgumentException;
use App\Application\AbstractController;
use App\Domaine\Contact\UseCase\SendMessage\SendMessageDTO;
use App\Domaine\Contact\UseCase\SendMessage\SendMessageInterface;

final class ContactController extends AbstractController
{
    public function index(
        SendMessageInterface $sendMessage,
    ) {

        if (isset($_POST['send_message'])) {
            try {
                if (!isset($_POST['message_tos']) || !$_POST['message_tos']) {
                    echo "avant";
                    throw new InvalidArgumentException('Vous devez accepter les CGUs.');
                }

                $messageDTO = new SendMessageDTO(
                    $_POST['message_first_name'],
                    $_POST['message_last_name'],
                    $_POST['message_email'],
                    $_POST['message_phone'],
                    $_POST['message_message']
                );

                $sendMessage($messageDTO);
                $this->addFlash('success', 'Votre message a bien été envoyé.');
            } catch (Throwable $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }
        $content = __DIR__ . '/../templates/contact.php';

        $this->render([
            'content' => $content
        ]);
    }
}
