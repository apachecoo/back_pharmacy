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
        return new Customer(
            $customerModel->id, 
            $customerModel->name, 
            $customerModel->phone, 
            $customerModel->address
        );
    }

    public function save($customer)
    {
        $customerModel = new CustomerModel();
        $customerModel->name = $customer->name;
        $customerModel->phone = $customer->phone;
        $customerModel->address = $customer->address;
        $customerModel->save();
        $customer->id = $customerModel->id;
    }

    public function update($customer)
    {
        $customerModel = new CustomerModel();
        $customerModel->name = $customer->name; 
        $customerModel->phone = $customer->phone;
        $customerModel->address = $customer->address;
        $customerModel->save();
    }

    public function delete($id): void
    {
        $customerModel = CustomerModel::find($id);
        if(!$customerModel){
            throw new \Exception('Customer not found');            
        }        
        $customerModel->delete();
    }
}
