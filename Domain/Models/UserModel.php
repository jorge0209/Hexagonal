<?php

namespace Domain\Models;

use Domain\Enums\UserRoleEnum;
use Domain\Enums\UserStatusEnum;
use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserName;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserPassword;

class UserModel
{
    public function __construct(
        private ?UserId $id,
        private UserName $name,
        private UserEmail $email,
        private UserPassword $password,
        private UserRoleEnum $role,
        private UserStatusEnum $status
    ) {
    }

    public function getId(): ?UserId
    {
        return $this->id;
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    public function getPassword(): UserPassword
    {
        return $this->password;
    }

    public function getRole(): UserRoleEnum
    {
        return $this->role;
    }

    public function getStatus(): UserStatusEnum
    {
        return $this->status;
    }
}