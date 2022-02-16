<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\User;
use App\Domain\UserRepositoryInterface;
use App\Shared\Domain\PublisherInterface;

class Create
{
    private UserRepositoryInterface $repository;
    private PublisherInterface $publisher;

    public function __construct(UserRepositoryInterface $repository, PublisherInterface $publisher)
    {
        $this->repository = $repository;
        $this->publisher = $publisher;
    }

    public function __invoke(User\Id $user_id, User\Email $user_email): void
    {
        $user = User::create($user_id, $user_email);

        $this->repository->save($user);

        $this->publisher->publish(...$user->uncommittedEvents());
    }
}
