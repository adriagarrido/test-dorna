<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Persistence;

use App\Domain\User;
use App\Domain\User\Id;
use App\Domain\UserRepositoryInterface;
use Exception;

class MySqlUserRepository implements UserRepositoryInterface
{
    private array $users;

    public function __construct()
    {
        $this->users = [];
    }

    public function save(User $user): void
    {
        $this->users[$user->id()->value()] = $user;
    }

    public function search(Id $user_id): ?User
    {
        if (!isset($this->users[$user_id->value()])) {
            return null;
        }

        return $this->users[$user_id->value()];
    }

    public function find(Id $user_id): User
    {
        if (!isset($this->users[$user_id->value()])) {
            throw new Exception('Not found.');
        }

        return $this->users[$user_id->value()];
    }
}
