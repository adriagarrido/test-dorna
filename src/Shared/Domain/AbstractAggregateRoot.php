<?php

declare(strict_types=1);

namespace App\Shared\Domain;

abstract class AbstractAggregateRoot
{
    /** @var EventInterface[] */
    private $uncommittedEvents = [];

    final public function record(EventInterface $event): void
    {
        $this->uncommittedEvents[] = $event;
    }

    /**
     * {@inheritdoc}
     */
    final public function uncommittedEvents(): array
    {
        $events = $this->uncommittedEvents;

        $this->uncommittedEvents = [];

        return $events;
    }
}