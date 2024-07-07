<?php

namespace App\Modules\Customer\Application\Handlers;
use App\Modules\Customer\Domain\Entities\Customer;
use App\Modules\Customer\Domain\Services\CustomerService;
use App\Modules\Customer\Application\Commands\DeleteCustomerCommand;

class DeleteCustomerHandler 
{
    public CustomerService $customerService;


    public function __construct(CustomerService $customerService)  {
        $this->customerService = $customerService;
    }

    public function handle(DeleteCustomerCommand $deleteCustomerCommand): Customer
    {
        return $this->customerService->deleteCustomer(
            $deleteCustomerCommand->id
        );   
    }
}

