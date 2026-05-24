<?php

namespace Application\Services\Dto\Commands;

class UpdateUserCommand
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $role,
        public readonly string $status
    ) {
    }
}