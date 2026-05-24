<?php

namespace Domain\Enums;

enum UserStatusEnum: string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}