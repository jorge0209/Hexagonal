<?php

namespace Application\Ports\In;

interface GetAllUsersUseCase
{
    public function execute(): array;
}