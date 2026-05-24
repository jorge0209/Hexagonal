<?php

namespace Infrastructure\Adapters\Persistence\MySQL\Config;

use PDO;
use PDOException;

class Connection
{
    public static function getConnection(): PDO
    {
        try {

            $pdo = new PDO(
                'mysql:host=localhost;dbname=hexagonal_app;charset=utf8',
                'root',
                ''
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e) {

            die('Error de conexión: ' . $e->getMessage());
        }
    }
}