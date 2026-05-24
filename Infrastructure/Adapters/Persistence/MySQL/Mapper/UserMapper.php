<?php

namespace Infrastructure\Adapters\Persistence\MySQL\Mapper;

use Domain\Models\UserModel;

use Infrastructure\Adapters\Persistence\MySQL\Entity\UserEntity;

class UserMapper
{
    public static function toEntity(
        UserModel $model
    ): UserEntity {

        return new UserEntity(

            $model->getId()?->value(),

            $model->getName()->value(),

            $model->getEmail()->value(),

            $model->getPassword()->value(),

            $model->getRole()->value,

            $model->getStatus()->value

        );
    }
}