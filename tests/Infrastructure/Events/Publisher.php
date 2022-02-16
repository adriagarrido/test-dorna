<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Events;

use App\Shared\Domain\PublisherInterface;
use App\Shared\Domain\EventInterface;

class Publisher implements PublisherInterface
{
    public function publish(EventInterface ...$events)
    {
    }
}
