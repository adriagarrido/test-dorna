<?php

declare(strict_types=1);

namespace App\Domain;

interface UserRepositoryInterface
{
    public function save(User $user): void;
    public function search(User\Id $user_id): ?User;
    public function find(User\Id $user_id): User;
}
