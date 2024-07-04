<?php

namespace App\Modules\Customer\Infrastructure\Repositories;

use App\Modules\Customer\Domain\Repositories\ClientRepositoryInterface;
use App\Modules\Customer\Models\Customer;

class CustomerRepository implements ClientRepositoryInterface
{
    public function find($id)
    {
        return Customer::find($id);
    }

    public function save($client)
    {
        $client->save();
    }
}
