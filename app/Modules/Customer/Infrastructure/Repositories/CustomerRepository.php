<?php

namespace App\Modules\Customer\Infrastructure\Repositories;

use App\Modules\Customer\Domain\Repositories\CustomerRepositoryInterface;
use App\Models\Customer as CustomerModel;
use App\Modules\Customer\Domain\Entities\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function find($id)
    {
        $customerModel = CustomerModel::find($id);
        return new Customer($customerModel->id, $customerModel->name, $customerModel->phone);
    }

    public function save($customer)
    {
        $customerModel = new CustomerModel();
        $customerModel->name = $customer->name;
        $customerModel->phone = $customer->phone;
        $customerModel->save();
        $customer->id = $customerModel->id;
    }
}
