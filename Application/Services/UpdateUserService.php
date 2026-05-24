<?php

namespace Application\Services;

use Application\Ports\In\UpdateUserUseCase;
use Application\Ports\Out\SaveUserPort;

use Application\Services\Dto\Commands\UpdateUserCommand;

use Domain\Models\UserModel;

use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserName;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserPassword;

use Domain\Enums\UserRoleEnum;
use Domain\Enums\UserStatusEnum;

class UpdateUserService implements UpdateUserUseCase
{
    public function __construct(
        private SaveUserPort $saveUserPort
    ) {
    }

    public function execute(UpdateUserCommand $command): void
    {
        $user = new UserModel(
            new UserId($command->id),
            new UserName($command->name),
            new UserEmail($command->email),
            new UserPassword('123456'),
            UserRoleEnum::from($command->role),
            UserStatusEnum::from($command->status)
        );

        $this->saveUserPort->update($user);
    }
}