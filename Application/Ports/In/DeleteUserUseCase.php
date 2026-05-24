<?php

namespace Application\Ports\In;

use Application\Services\Dto\Commands\DeleteUserCommand;

interface DeleteUserUseCase
{
    public function execute(DeleteUserCommand $command): void;
}