<?php

namespace Application\Ports\In;

use Application\Services\Dto\Commands\UpdateUserCommand;

interface UpdateUserUseCase
{
    public function execute(UpdateUserCommand $command): void;
}