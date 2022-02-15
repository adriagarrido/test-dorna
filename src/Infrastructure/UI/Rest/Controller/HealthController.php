<?php

declare(strict_types=1);

namespace App\Infrastructure\UI\Rest\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse();
    }
}
