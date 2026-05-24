<?php

namespace Application\Ports\In;

use Application\Services\Dto\Commands\CreateUserCommand;

interface CreateUserUseCase
{
    public function execute(CreateUserCommand $command): void;
}