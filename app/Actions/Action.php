<?php

declare(strict_types=1);

namespace App\Actions;

use App\Actions\Request;
use Illuminate\Database\Eloquent\Model;

abstract class Action
{
    private Model $model;

    public function __construct(
        Model $model
    ) {
        $this->model = $model;
    }

    abstract public function execute(Request $request);
}
