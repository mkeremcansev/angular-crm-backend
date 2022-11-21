<?php

namespace App\Http\Controllers\Todo\Controller;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Todo\Request\TodoStoreRequest;
use App\Http\Controllers\Todo\Service\TodoService;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * @var TodoService
     */
    public TodoService $service;

    /**
     * @var ResponseHelper
     */
    public ResponseHelper $response;

    /**
     * @param TodoService $service
     * @param ResponseHelper $response
     */
    public function __construct(TodoService $service, ResponseHelper $response)
    {
        $this->service = $service;
        $this->response = $response;
    }

    /**
     * @param TodoStoreRequest $request
     * @return JsonResponse
     */
    public function store(TodoStoreRequest $request): JsonResponse
    {
        $store = $this->service->store($request->validated());

        return $store
            ? $this->response->store($store->id)
            : $this->response->error();
    }

    /**
     * @param int $id
     * @return Model|Builder|null
     */
    public function edit($id):Model|Builder|null
    {
        return $this->service->edit($id);
    }
}
