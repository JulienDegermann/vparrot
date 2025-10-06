<?php

namespace App\Config\DataBase;

use PDO;
use PDOException;

final class DatabaseConnect
{
    private string $host = 'db';
    private string $username = 'root';
    private string $password = 'root';
    private string $dbName = 'vparrot';
    private int $port = 3306;
    private string $charset = 'utf8mb4';
    private string $dsn = '';
    private ?PDO $pdo = null;

    public function __construct()
    {
        $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";port=" . $this->port . ";charset=" . $this->charset;
    }

    /**
     * Connection to the database
     * @return PDO - PDO connexion
     * @throws PDOException
     */
    public function connect(): PDO
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO($this->dsn, $this->username, $this->password);
            } catch (PDOException $e) {
                throw new PDOException("ERROR : impossible to connext to database : " . $e->getMessage(), (int)$e->getCode());
            }
        };

        return $this->pdo;
    }
}
