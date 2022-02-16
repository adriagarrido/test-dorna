<?php

declare(strict_types=1);

namespace App\Test\Application;

use App\Application\Create;
use App\Domain\User;
use App\Tests\Infrastructure\Events\Publisher;
use App\Tests\Infrastructure\Persistence\MySqlUserRepository;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    public function testCreate()
    {
        $repository = new MySqlUserRepository();
        $publisher = new Publisher();

        $create_user = new Create($repository, $publisher);
        $create_user(User\Id::random(), new User\Email('adriagarrido@outlook.com'));

        $this->assertTrue(true);
    }
}
