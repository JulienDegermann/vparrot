<?php

namespace App\Application;

interface SessionInterface
{
    public function setSession(): void;
    public function destroySession(): void;
}
