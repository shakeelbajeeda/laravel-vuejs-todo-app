<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * Return json response
     *
     * @param string $message
     * @param $data
     * @param bool $status
     * @param int $code
     * @return JsonResponse
     */
    protected function respond(string $message = "success", $data = [], bool $status = true, int $code = 200): JsonResponse
    {
        return response()->json([
            "message" => $message,
            "status" => $status,
            "data" => $data,
        ], $code);
    }
}
