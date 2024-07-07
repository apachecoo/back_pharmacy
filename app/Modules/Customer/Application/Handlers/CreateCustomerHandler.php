<?php

namespace App\Modules\Customer\Application\Handlers;

use App\Modules\Customer\Application\Commands\CreateCustomerCommand;
use App\Modules\Customer\Domain\Services\CustomerService;

class CreateCustomerHandler
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function handle(CreateCustomerCommand $command)
    {
        return $this->customerService->registerCustomer($command->name, $command->phone, $command->address);
    }
}
