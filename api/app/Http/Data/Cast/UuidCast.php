<?php

namespace App\Http\Data\Cast;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class UuidCast implements Cast
{

    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): UuidInterface
    {
        if (!Uuid::isValid($value)) {
            throw new \InvalidArgumentException("Invalid UUID: $value");
        }

        return Uuid::fromString($value);
    }
}