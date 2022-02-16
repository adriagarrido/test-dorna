<?php

declare(strict_types=1);

namespace App\Test\Domain;

use App\Domain\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCreate()
    {
        $user = User::create(User\Id::random(), new User\Email('adriagarrido@outlook.com'));

        $this->assertInstanceOf(User::class, $user);
    }

    public function testChangeEmail()
    {
        $user = new User(User\Id::random(), new User\Email('adriagarrido@outlook.com'));
        $new_email = 'adriagarrido@gmail.com';
        $user->changeEmail(new User\Email($new_email));

        $this->assertEquals($new_email, $user->email()->value());
    }
}
