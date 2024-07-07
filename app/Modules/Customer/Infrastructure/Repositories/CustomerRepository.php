<?php

namespace App\Modules\Customer\Infrastructure\Repositories;

use App\Modules\Customer\Domain\Repositories\CustomerRepositoryInterface;
use App\Models\Customer as CustomerModel;
use App\Modules\Customer\Domain\Entities\Customer;


class CustomerRepository implements CustomerRepositoryInterface
{
    public function find(int $id): Customer
    {
        $customerModel = CustomerModel::find($id);
        return $this->getCustomer($customerModel);
    }

    public function save(Customer $customer): Customer
    {
        $customerModel = new CustomerModel();
        $customerModel->name = $customer->name;
        $customerModel->phone = $customer->phone;
        $customerModel->address = $customer->address;
        $customerModel->save();
        $customer->id = $customerModel->id;
        return $this->getCustomer($customerModel);
    }

    public function update(int $id, Customer $customer): Customer
    {
        $customerModel = CustomerModel::find($id);
        if(!$customerModel){
            throw new \Exception('Customer not found');
        }
        $customerModel->name = $customer->name;
        $customerModel->phone = $customer->phone;
        $customerModel->address = $customer->address;
        $customerModel->save();
        return $this->getCustomer($customerModel);
    }

    public function delete(int $id): ?Customer
    {
        $customerModel = CustomerModel::find($id);
        if (!$customerModel) {
            throw new \Exception('Customer not found');
        }
        $customerModel->delete();
        return $this->getCustomer($customerModel);
    }

    public function getCustomer(CustomerModel $customerModel): Customer
    {
        return new Customer(
            $customerModel->id,
            $customerModel->name,
            $customerModel->phone,
            $customerModel->address
        );
    }
}
