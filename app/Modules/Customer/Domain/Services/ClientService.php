<?php

namespace App\Modules\Customer\Domain\Services;

use App\Modules\Customer\Domain\Repositories\ClientRepositoryInterface;

class ClientService
{
    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function registerClient($name, $email)
    {
        // Lógica para registrar un nuevo cliente
    }
}