<?php

declare(strict_types=1);

namespace Domain\Battery\Application\Service;

use Domain\Battery\Domain\Repository\BatteryRepositoryInterface;
use Ramsey\Uuid\UuidInterface;

readonly class BatteryService
{
    public function __construct(
        private BatteryRepositoryInterface $batteryRepository
    ) {}

    public function saveBatteryStatus(UuidInterface $uuid, int $percent)
    {
        if ($percent < 0 || $percent > 100) {
            throw new \InvalidArgumentException('Battery percent must be between 0 and 100');
        }

        return $this->batteryRepository->saveBatteryStatus(
            $uuid,
            $percent
        );
    }
}