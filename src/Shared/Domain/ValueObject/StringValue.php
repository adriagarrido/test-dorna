<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

class StringValue
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
