<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    /**
     * @param $data
     * @param $id
     * @return JsonResponse
     */
    public function store($id = null, $data = null): JsonResponse
    {
        return response()->json([
            'message' => __('words.created_successfully'),
            'id' => $id,
            'data' => $data
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function error(): JsonResponse
    {
        return response()->json([
            'message' => __('words.error')
        ]);
    }
}
