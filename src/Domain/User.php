<?php

declare(strict_types=1);

namespace App\Domain;

use App\Shared\Domain\AbstractAggregateRoot;

class User extends AbstractAggregateRoot
{
    private User\Id $id;
    private User\Email $email;

    public function __construct(User\Id $user_id, User\Email $user_email)
    {
        $this->id = $user_id;
        $this->email = $user_email;
    }

    public static function create(User\Id $user_id, User\Email $user_email): self
    {
        $user = new self($user_id, $user_email);

        $user->record(new UserCreatedEvent());

        return $user;
    }

    public function id(): User\Id
    {
        return $this->id;
    }

    public function email(): User\Email
    {
        return $this->email;
    }

    public function changeEmail(User\Email $user_email): void
    {
        $this->email = $user_email;

        $this->record(new UserChangeEmailEvent());
    }
}
