<?php

namespace Application\Services;

use Application\Ports\In\GetAllUsersUseCase;
use Application\Ports\Out\FindUserPort;

class GetAllUsersService implements GetAllUsersUseCase
{
    public function __construct(
        private FindUserPort $findUserPort
    ) {
    }

    public function execute(): array
    {
        return $this->findUserPort->findAll();
    }
}