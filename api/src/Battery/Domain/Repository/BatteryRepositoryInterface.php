<?php

declare(strict_types=1);

namespace Domain\Battery\Domain\Repository;

use Ramsey\Uuid\UuidInterface;

interface BatteryRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function saveBatteryStatus(UuidInterface $uuid, int $percent): mixed;
}