<?php

namespace App\Modules\Customer\Application\Handlers;
use App\Modules\Customer\Domain\Entities\Customer;
use App\Modules\Customer\Domain\Services\CustomerService;
use App\Modules\Customer\Application\Commands\UpdateCustomerCommand;

class UpdateCustomerHandler 
{
    public CustomerService $customerService;


    public function __construct(CustomerService $customerService)  {
        $this->customerService = $customerService;
    }

    public function handle(UpdateCustomerCommand $updateCustomerCommand): Customer
    {
        return $this->customerService->updateCustomer(
            $updateCustomerCommand->id,
            $updateCustomerCommand->name,
            $updateCustomerCommand->phone,
            $updateCustomerCommand->address,
        );   
    }
}

