<?php

namespace App\Repositories;

abstract class CoreRepository
{
    /** @var \Eloquent */
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    /**
     * @return \Eloquent
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
