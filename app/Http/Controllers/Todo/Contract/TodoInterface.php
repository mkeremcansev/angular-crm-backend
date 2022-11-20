<?php

namespace App\Http\Controllers\Todo\Contract;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface TodoInterface
{
    /**
     * @param $request
     * @return Builder|Model
     */
    public function store($request): Model|Builder;
}
