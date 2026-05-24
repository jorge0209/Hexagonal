<?php

namespace Infrastructure\Entrypoints\Web\Controllers;

use Infrastructure\Adapters\Persistence\MySQL\Repository\UserRepositoryMySQL;

use Application\Services\CreateUserService;
use Application\Services\GetAllUsersService;
use Application\Services\UpdateUserService;
use Application\Services\DeleteUserService;

use Application\Services\Dto\Commands\CreateUserCommand;
use Application\Services\Dto\Commands\UpdateUserCommand;
use Application\Services\Dto\Commands\DeleteUserCommand;

class UserController
{
    private UserRepositoryMySQL $repository;

    public function __construct()
    {
        $this->repository = new UserRepositoryMySQL();
    }

    public function index()
    {
        $service = new GetAllUsersService(
            $this->repository
        );

        $users = $service->execute();

        require '../Infrastructure/Entrypoints/Web/Views/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            try {

                $command = new CreateUserCommand(

                    $_POST['name'],

                    $_POST['email'],

                    $_POST['password'],

                    $_POST['role'],

                    $_POST['status']

                );

                $service = new CreateUserService(

                    $this->repository,
                    $this->repository

                );

                $service->execute($command);

                header('Location: index.php');

            } catch (\Exception $e) {

                $error = $e->getMessage();
            }
        }

        require '../Infrastructure/Entrypoints/Web/Views/create.php';
    }

    public function edit()
    {
        $id = $_GET['id'];

        $user = $this->repository->findById($id);

        if (!$user) {

            die('Usuario no encontrado');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $command = new UpdateUserCommand(

                $id,

                $_POST['name'],

                $_POST['email'],

                $_POST['role'],

                $_POST['status']

            );

            $service = new UpdateUserService(
                $this->repository
            );

            $service->execute($command);

            header('Location: index.php');
        }

        require '../Infrastructure/Entrypoints/Web/Views/edit.php';
    }

    public function delete()
    {
        $command = new DeleteUserCommand(
            $_GET['id']
        );

        $service = new DeleteUserService(
            $this->repository
        );

        $service->execute($command);

        header('Location: index.php');
    }
}