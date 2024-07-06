<?php

namespace App\Modules\Customer\Domain\Repositories;

interface CustomerRepositoryInterface
{
    public function find($id);
    public function save($customer);

    public function update($customer);
    public function delete($id);
}
