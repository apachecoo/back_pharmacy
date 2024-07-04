<?php

namespace App\Modules\Customer\Domain\Repositories;

interface ClientRepositoryInterface
{
    public function find($id);
    public function save($client);
}
