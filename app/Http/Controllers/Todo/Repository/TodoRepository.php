<?php

namespace App\Http\Controllers\Todo\Repository;

use App\Http\Controllers\Todo\Contract\TodoInterface;
use App\Models\Todo\Todo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TodoRepository implements TodoInterface
{
    /**
     * @var Todo
     */
    public Todo $model;

    /**
     * @param Todo $model
     */
    public function __construct(Todo $model)
    {
        $this->model = $model;
    }

    /**
     * @param $request
     * @return Builder|Model
     */
    public function store($request): Model|Builder
    {
        return $this->model->query()->create($request);
    }

    /**
     * @param int $id
     * @return Model|Builder|null
     */
    public function todoById($id): Model|Builder|null
    {
        return $this->model->find($id);
    }
}
