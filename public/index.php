<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../Common/Autoload.php';

use Infrastructure\Adapters\Persistence\MySQL\Repository\UserRepositoryMySQL;

$repository = new UserRepositoryMySQL();

$users = $repository->findAll();

echo '<pre>';

print_r($users);

echo '</pre>';