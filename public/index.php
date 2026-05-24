<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../Common/Autoload.php';

use Infrastructure\Entrypoints\Web\Controllers\UserController;

$controller = new UserController();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'create':
        $controller->create();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'delete':
        $controller->delete();
        break;

    default:
        $controller->index();
        break;
}