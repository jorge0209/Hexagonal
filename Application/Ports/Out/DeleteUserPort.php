<?php

namespace Application\Ports\Out;

interface DeleteUserPort
{
    public function delete(int $id): void;
}