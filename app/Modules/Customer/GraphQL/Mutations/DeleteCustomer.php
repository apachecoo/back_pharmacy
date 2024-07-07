<?php
declare(strict_types=1);

namespace App\Modules\Customer\GraphQL\Mutations;

use App\Modules\Customer\Application\Commands\DeleteCustomerCommand;
use App\Modules\Customer\Application\Handlers\DeleteCustomerHandler;

final readonly class DeleteCustomer
{
    private DeleteCustomerCommand $command;
    private DeleteCustomerHandler $handler;
    
    function __invoke($rootValue, array $args)
    {
        $this->handler = app(DeleteCustomerHandler::class);
        $this->command = new DeleteCustomerCommand(
            (int) $args['id'] ?? null
        );
        return $this->handler->handle($this->command);
    }
}


