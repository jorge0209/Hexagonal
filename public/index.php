<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../Common/Autoload.php';

use Infrastructure\Adapters\Persistence\MySQL\Config\Connection;

try {

    $connection = Connection::getConnection();

    echo 'Conexión exitosa a MySQL';

} catch (Exception $e) {

    echo $e->getMessage();
}