<?php

namespace Application\Services;

use Application\Ports\In\DeleteUserUseCase;
use Application\Ports\Out\DeleteUserPort;

use Application\Services\Dto\Commands\DeleteUserCommand;

class DeleteUserService implements DeleteUserUseCase
{
    public function __construct(
        private DeleteUserPort $deleteUserPort
    ) {
    }

    public function execute(DeleteUserCommand $command): void
    {
        $this->deleteUserPort->delete($command->id);
    }
}