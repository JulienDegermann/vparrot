<?php

namespace App\Application;

abstract class AbstractController
{

    /**
     * Method that render a template
     * @param string $path - path of the template
     */
    public function render(string $path, array $datas = []): void
    {
        extract($datas);
        include_once($path);
    }
}
