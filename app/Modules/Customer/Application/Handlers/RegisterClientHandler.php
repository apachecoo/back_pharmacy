<?php

namespace App\Modules\Customer\Application\Handlers;

use App\Modules\Customer\Application\Commands\RegisterClientCommand;
use App\Modules\Customer\Domain\Services\ClientService;

class RegisterClientHandler
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function handle(RegisterClientCommand $command)
    {
        $this->clientService->registerClient($command->name, $command->email);
    }
}
