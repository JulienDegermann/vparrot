<?php

namespace App\Application;

abstract class AbstractController
{
    /**
     * @var array $flashes array containing flash messages
     */
    protected array $flashes = [];

    /**
     * Method that render a template
     * @param string $path path of the template
     */
    public function render(string $path, array $datas = []): void
    {
        $this->flashes = $_SESSION['flash'] ?? [];
        $datas['flashes'] = $this->flashes;
        $_SESSION['flash'] = [];
        extract($datas);

        include_once($path);
    }

    /**
     * Add flash messages to template
     * @param string $type type of flash
     * @param string $message message of flash to display
     * @return void
     */
    public function addFlash(string $type, string $message): void
    {
        $flash = [
            'type' => $type,
            'message' => $message
        ];

        $_SESSION['flash'][] = $flash;
    }

    /**
     * redirect to uri
     * @param string $uri uri to redirect
     * @return void
     */
    public function redirectToUri(string $uri): void
    {
        header("Location: $uri");
        exit();
    }
}
