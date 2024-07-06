<?php

namespace App\Modules\Customer\Application\Handlers;
use App\Modules\Customer\Domain\Services\CustomerService;
use App\Modules\Customer\Application\Commands\UpdateCustomerCommand;

class UpdateCustomerHandler 
{
    public CustomerService $customerService;

    public UpdateCustomerCommand $command;

    public function __construct(CustomerService $customerService)  {
        $this->customerService = $customerService;
        $this->command = new UpdateCustomerCommand($customerService);
    }

    public function handle(){
        
    }
}

