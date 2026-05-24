<?php

namespace Infrastructure\Adapters\Persistence\MySQL\Entity;

class UserEntity
{
    public function __construct(

        public ?int $id,

        public string $name,

        public string $email,

        public string $password,

        public string $role,

        public string $status,

        public ?string $created_at = null,

        public ?string $updated_at = null

    ) {
    }
}