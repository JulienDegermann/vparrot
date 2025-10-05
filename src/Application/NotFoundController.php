<?php

namespace App\Application;

final class NotFoundController extends AbstractController
{
    public function index()
    {
        $content = ROOT_DIR . '/templates/404.php';

        $this->render(ROOT_DIR . '/templates/base.php', [
            'content' => $content
        ]);
    }
}
