<?php

namespace Domain\Battery\Infrastructure\Persistence\Repository;

use Domain\Battery\Domain\Repository\BatteryRepositoryInterface;
use Domain\Battery\Infrastructure\Persistence\Eloquent\PingModel;
use Ramsey\Uuid\UuidInterface;

class BatteryRepository implements BatteryRepositoryInterface
{
    public function saveBatteryStatus(UuidInterface $uuid, int $percent): PingModel
    {
        $battery = PingModel::query()->where('uuid', $uuid->getBytes())->first();
        if (!$battery) {
            return PingModel::query()->create([
                'uuid' => $uuid->getBytes(),
                'battery_percent' => $percent,
            ]);
        }

        $battery->update([
            'battery_percent' => $percent,
        ]);

        return $battery;
    }
}