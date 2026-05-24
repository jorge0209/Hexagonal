<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\InvalidUserNameException;

class UserName
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if (strlen($value) < 3) {
            throw new InvalidUserNameException(
                'El nombre debe tener mínimo 3 caracteres'
            );
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}