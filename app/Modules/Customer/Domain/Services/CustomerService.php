<?php

namespace App\Modules\Customer\Domain\Services;

use App\Modules\Customer\Domain\Repositories\CustomerRepositoryInterface;
use App\Modules\Customer\Domain\Entities\Customer;

class CustomerService
{
    private $CustomerRepository;

    public function __construct(CustomerRepositoryInterface $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function registerCustomer(string $name, string $phone, string $address): Customer
    {
        $Customer = new Customer(null, $name, $phone, $address);
        $this->CustomerRepository->save($Customer);
        return $Customer;
    }

    public function updateCustomer(int $id, string $name, string $phone, string $address): Customer
    {
        $Customer = new Customer($id, $name, $phone, $address);
        $this->CustomerRepository->update($Customer->id, $Customer);
        return $Customer;        
    }

    public function deleteCustomer(int $id): Customer
    {
        return $this->CustomerRepository->delete($id);
    }
}
