<?php

namespace Domain\Enums;

enum UserRoleEnum: string
{
    case ADMIN = 'ADMIN';
    case USER = 'USER';
}