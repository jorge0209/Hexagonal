<?php

namespace Domain\ValueObjects;

class UserPassword
{
    private string $value;

    public function __construct(string $password)
    {
        $this->value = password_hash(
            $password,
            PASSWORD_BCRYPT
        );
    }

    public function value(): string
    {
        return $this->value;
    }
}