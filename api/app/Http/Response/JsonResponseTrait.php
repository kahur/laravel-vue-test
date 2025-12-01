<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

trait JsonResponseTrait
{
    public function successResponse(array|JsonResource|Collection|null $data = [], string $status = 'OK'): JsonResponse
    {
        return $this->response(200, $status, $data);
    }

    public function errorResponse(string $message, int $code = 500): JsonResponse
    {
        return $this->response($code, 'Error', [
            'data' => $message
        ]);
    }

    public function response(
        int $code,
        string $status,
        array|JsonResource|Collection|null $data = [],
    ): JsonResponse {
        $responseData = [
            'status' => $status,
        ];

        if (!empty($data)) {
            $responseData['data'] = $data;
        }

        return response()->json($responseData, $code);
    }
}