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

    public function registerCustomer($name, $phone)
    {
        $Customer = new Customer(null, $name, $phone);
        $this->CustomerRepository->save($Customer);
        return $Customer;
    }

    public function updateCustomer($name, $phone, $address)
    {
        $Customer = new Customer(null, $name, $phone, $address);
        $this->CustomerRepository->update($Customer);
        return $Customer;        
    }
}
