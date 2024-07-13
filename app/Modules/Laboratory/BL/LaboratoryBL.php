<?php

namespace App\Modules\Laboratory\BL;

use App\Modules\Laboratory\Repositories\LaboratoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LaboratoryBL
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new LaboratoryRepository;
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): ?Model
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
