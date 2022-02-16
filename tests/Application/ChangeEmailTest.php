<?php

declare(strict_types=1);

namespace App\Test\Application;

use App\Application\ChangeEmail;
use App\Domain\User;
use App\Domain\UserRepositoryInterface;
use App\Shared\Domain\PublisherInterface;
use App\Tests\Infrastructure\Events\Publisher;
use App\Tests\Infrastructure\Persistence\MySqlUserRepository;
use Exception;
use PHPUnit\Framework\TestCase;

class ChangeEmailTest extends TestCase
{
    private UserRepositoryInterface $repository;
    private PublisherInterface $publisher;
    private ChangeEmail $change_email;

    protected function setUp(): void
    {
        $this->repository = new MySqlUserRepository();
        $publisher = new Publisher();
        $this->change_email = new ChangeEmail($this->repository, $publisher);
    }
    public function testChangeEmailShouldThrowNotFoundException()
    {
        $this->expectException(Exception::class);
        $this->change_email->__invoke(User\Id::random(), new User\Email('adriagarrido@outlook.com'));
    }

    public function testChangeEmail()
    {
        $user_id = User\Id::random();

        $user = User::create($user_id, new User\Email('aaaa@aaaa.com'));
        $this->repository->save($user);

        $new_email = 'bbbb@bbb.com';
        $this->change_email->__invoke($user_id, new User\Email($new_email));

        $user = $this->repository->find($user_id);

        $this->assertEquals($new_email, $user->email()->value());
    }
}
