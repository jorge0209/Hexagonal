<?php

namespace Application\Services;

use Application\Ports\In\CreateUserUseCase;
use Application\Ports\Out\SaveUserPort;
use Application\Ports\Out\FindUserPort;

use Application\Services\Dto\Commands\CreateUserCommand;

use Domain\Models\UserModel;

use Domain\ValueObjects\UserName;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserPassword;

use Domain\Enums\UserRoleEnum;
use Domain\Enums\UserStatusEnum;

use Domain\Exceptions\UserAlreadyExistsException;

class CreateUserService implements CreateUserUseCase
{
    public function __construct(
        private SaveUserPort $saveUserPort,
        private FindUserPort $findUserPort
    ) {
    }

    public function execute(CreateUserCommand $command): void
    {
        $existingUser = $this->findUserPort
            ->findByEmail($command->email);

        if ($existingUser) {

            throw new UserAlreadyExistsException(
                'El correo ya está registrado'
            );
        }

        $user = new UserModel(
            null,
            new UserName($command->name),
            new UserEmail($command->email),
            new UserPassword($command->password),
            UserRoleEnum::from($command->role),
            UserStatusEnum::from($command->status)
        );

        $this->saveUserPort->save($user);
    }
}