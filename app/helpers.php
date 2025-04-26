<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('success')) {
    function success($data): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }
}
