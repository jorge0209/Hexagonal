<?php

namespace Infrastructure\Adapters\Persistence\MySQL\Repository;

use PDO;

use Domain\Models\UserModel;

use Application\Ports\Out\SaveUserPort;
use Application\Ports\Out\FindUserPort;
use Application\Ports\Out\DeleteUserPort;

use Infrastructure\Adapters\Persistence\MySQL\Config\Connection;

use Infrastructure\Adapters\Persistence\MySQL\Mapper\UserMapper;

class UserRepositoryMySQL implements
    SaveUserPort,
    FindUserPort,
    DeleteUserPort
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    public function save(UserModel $user): void
    {
        $entity = UserMapper::toEntity($user);

        $sql = "

            INSERT INTO users
            (
                name,
                email,
                password,
                role,
                status
            )

            VALUES
            (
                :name,
                :email,
                :password,
                :role,
                :status
            )

        ";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([

            ':name' => $entity->name,

            ':email' => $entity->email,

            ':password' => $entity->password,

            ':role' => $entity->role,

            ':status' => $entity->status

        ]);
    }

    public function update(UserModel $user): void
    {
        $entity = UserMapper::toEntity($user);

        $sql = "

            UPDATE users

            SET

                name = :name,

                email = :email,

                role = :role,

                status = :status

            WHERE id = :id

        ";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([

            ':id' => $entity->id,

            ':name' => $entity->name,

            ':email' => $entity->email,

            ':role' => $entity->role,

            ':status' => $entity->status

        ]);
    }

    public function delete(int $id): void
    {
        $sql = "

            DELETE FROM users

            WHERE id = :id

        ";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([

            ':id' => $id

        ]);
    }

    public function findAll(): array
    {
        $sql = "

            SELECT *

            FROM users

            ORDER BY id DESC

        ";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $sql = "

            SELECT *

            FROM users

            WHERE id = :id

        ";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([

            ':id' => $id

        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public function findByEmail(
        string $email
    ): ?array {

        $sql = "

            SELECT *

            FROM users

            WHERE email = :email

        ";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([

            ':email' => $email

        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}