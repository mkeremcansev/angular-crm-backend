<?php

namespace App\Http\Controllers\Todo\Service;

use App\Http\Controllers\Todo\Contract\TodoInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TodoService
{
    /**
     * @var TodoInterface
     */
    public TodoInterface $repository;

    /**
     * @param TodoInterface $repository
     */
    public function __construct(TodoInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $request
     * @return Builder|Model
     */
    public function store($request): Builder|Model
    {
        return $this->repository->store($request);
    }

    /**
     * @param int $id
     * @return Model|Builder|null
     */
    public function edit($id): Model|Builder|null
    {
        return $this->repository->todoById($id);
    }
}
