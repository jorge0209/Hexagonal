<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\InvalidUserEmailException;

class UserEmail
{
    private string $value;

    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {

            throw new InvalidUserEmailException(
                'Correo electrónico inválido'
            );
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}