<?php

namespace App\Application;

use App\Application\SessionInterface;
use DateTime;
use DateTimeImmutable;

final class Session implements SessionInterface
{
    protected $session;

    public function setSession(): void
    {
        ini_set('session.save_path', ROOT_DIR . 'config/SessionFiles/');
        session_start();
        $this->session = $_SESSION;

        /**
         * @var int $now now in timestamp in secondes
         */
        $now = (new DateTimeImmutable('now'))->getTimestamp();

        /**
         * @var int $delay delay in seconds
         */
        $delay =  60 * 30;

        if (
            isset($this->session['last_activity']) &&
            $now - $this->session['last_activity'] > $delay
        ) {
        }
        $this->session['last_activity'] = $now;
    }

    public function destroySession(): void
    {
        session_unset();
        session_destroy();
    }
}
