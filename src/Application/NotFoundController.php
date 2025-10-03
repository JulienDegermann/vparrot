<?php

namespace App\Application;

final class NotFoundController extends AbstractController
{
    public function index()
    {
        // change file after creating a template 404.php
        $this->render(ROOT_DIR . '/templates/404.php');
    }
}
