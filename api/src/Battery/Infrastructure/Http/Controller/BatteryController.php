<?php

declare(strict_types=1);

namespace Domain\Battery\Infrastructure\Http\Controller;

use App\Http\Controllers\Controller;
use Domain\Battery\Application\Service\BatteryService;
use Domain\Battery\Infrastructure\Http\Request\PingRequest;
use Illuminate\Http\JsonResponse;

class BatteryController extends Controller
{
    public function __construct(
        protected readonly BatteryService $batteryService
    ) { }

    public function status(): JsonResponse
    {
        return $this->successResponse();
    }

    public function saveBatteryStatus(PingRequest $pingRequest): JsonResponse
    {
        if ($this->batteryService->saveBatteryStatus(
            $pingRequest->uuid,
            $pingRequest->percent
        )) {
            return $this->successResponse();
        }

        return $this->errorResponse('Failed to save battery status');
    }
}