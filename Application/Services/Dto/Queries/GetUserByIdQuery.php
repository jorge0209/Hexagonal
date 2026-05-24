<?php

namespace Application\Services\Dto\Queries;

class GetUserByIdQuery
{
    public function __construct(
        public readonly int $id
    ) {
    }
}