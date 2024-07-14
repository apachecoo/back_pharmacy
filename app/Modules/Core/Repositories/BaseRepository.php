<?php

namespace App\Modules\Core\Repositories;    

abstract class BaseRepository
{
    protected $model;
    protected $repository;
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
        $this->model = $repository->getModel();
    }
}