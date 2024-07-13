<?php
namespace App\Modules\Laboratory\Repositories;

use App\Models\Laboratory;
use Illuminate\Database\Eloquent\Collection;

class LaboratoryRepository
{

    public function getAll(): Collection
    {
        return Laboratory::all();
    }

    public function getById(int $id): Laboratory
    {
        return Laboratory::findOrFail($id);
    }

    public function create(array $data): Laboratory
    {
        return Laboratory::create($data);
    }

    public function update(int $id, array $data): Laboratory
    {
        $laboratory = Laboratory::findOrFail($id);
        $laboratory->update($data);
        return $laboratory;
    }

    public function delete(int $id): bool
    {
        $laboratory = Laboratory::findOrFail($id);
        return $laboratory->delete();
    }

}
