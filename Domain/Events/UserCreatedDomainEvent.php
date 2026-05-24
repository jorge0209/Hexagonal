<?php

namespace Domain\Events;

class UserCreatedDomainEvent
{
    public function __construct(
        public readonly string $email
    ) {
    }
}