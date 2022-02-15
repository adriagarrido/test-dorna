<?php

declare(strict_types=1);

namespace App\Shared\Domain;

interface PublisherInterface
{
    public function publish(EventInterface ...$events);
}