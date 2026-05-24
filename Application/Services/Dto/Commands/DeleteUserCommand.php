<?php

namespace Application\Services\Dto\Commands;

class DeleteUserCommand
{
    public function __construct(
        public readonly int $id
    ) {
    }
}