<?php

namespace Domain\Battery\Infrastructure\Http\Request;

use App\Http\Data\Cast\UuidCast;
use Ramsey\Uuid\UuidInterface;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class PingRequest extends Data
{
    public function __construct(
        #[Required, WithCast(UuidCast::class)]
        public readonly UuidInterface $uuid,
        #[Required, Numeric]
        public readonly int $percent
    ) {
    }
}