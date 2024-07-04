<?php

namespace App\Clients\Application\Handlers;

use App\Clients\Application\Queries\GetClientByIdQuery;
use App\Clients\Domain\Repositories\ClientRepositoryInterface;

class GetClientByIdHandler
{
    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function handle(GetClientByIdQuery $query)
    {
        return $this->clientRepository->find($query->id);
    }
}
