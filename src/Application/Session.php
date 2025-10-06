<?php

namespace App\Application;

use DateTimeImmutable;

final class Session
{
    public static function setSession(): void
    {
        ini_set('session.save_path', ROOT_DIR . 'config/SessionFiles/');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        /**
         * @var int $now now in timestamp in secondes
         */
        $now = (new DateTimeImmutable('now'))->getTimestamp();

        /**
         * @var int $delay delay in seconds
         */
        $delay =  60 * 30;

        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }

        if (
            isset($_SESSION['last_activity']) &&
            $now - $_SESSION['last_activity'] > $delay
        ) {
        }
        $_SESSION['last_activity'] = $now;
    }

    public static function destroySession(): void
    {
        session_unset();
        session_destroy();
        session_start();
    }
}
