<?php

declare(strict_types=1);

namespace App\DTO;

class SuccessResponse
{
    public function toArray(string $key, mixed $value)
    {
        return [$key => $value];
    }
}
