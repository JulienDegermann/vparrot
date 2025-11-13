<?php

namespace App\Application;

use App\Domaine\UserManagement\Entity\User;
use App\Domaine\UserManagement\Repositories\UserRepositoryInterface;

abstract class AbstractController
{

    /**
     * @var ?User $user user in session (logged or not)
     */
    protected ?User $user = null;

    /**
     * @var array $flashes array containing flash messages
     */
    protected array $flashes = [];

    /**
     * 
     */
    protected string $baseTemplate = BASE_TEMPLATE;

    // public function __construct(
    //     private readonly UserRepositoryInterface $userRepo
    // ) {
    //     $user = $_SESSION['user'] ? $this->userRepo->hydrate($_SESSION['user']) : new User();
    // }


    /**
     * Method that render a template
     * @param string $path path of the template
     */
    public function render(array $datas = []): void
    {
        $this->flashes = $_SESSION['flash'] ?? [];
        $datas['flashes'] = $this->flashes;
        $_SESSION['flash'] = [];
        extract($datas);

        include_once($this->baseTemplate);
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
