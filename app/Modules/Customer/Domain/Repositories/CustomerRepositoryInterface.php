<?php

namespace App\Modules\Customer\Domain\Repositories;

use App\Modules\Customer\Domain\Entities\Customer;

interface CustomerRepositoryInterface
{
    public function find(int $id): Customer;
    public function save(Customer $customer): Customer;
    public function update(int $id, Customer $customer): ?Customer;
    public function delete(int $id): ?Customer;
}
