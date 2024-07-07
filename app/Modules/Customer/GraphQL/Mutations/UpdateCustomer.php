<?php
declare(strict_types=1);

namespace App\Modules\Customer\GraphQL\Mutations;

use App\Modules\Customer\Application\Commands\DeleteCustomerCommand;
use App\Modules\Customer\Application\Handlers\DeleteCustomerHandler;

final readonly class UpdateCustomer
{
    private DeleteCustomerCommand $command;
    private DeleteCustomerHandler $handler;
    public function __construct()
    {
        $this->handler = app(DeleteCustomerHandler::class);
    }

    function __invoke($rootValue, array $args)
    {
        $this->command = new DeleteCustomerCommand(
            (int)$args['id'],
            $args['input']['name'],
            $args['input']['phone'],
            $args['input']['address'],
        );
        return $this->handler->handle($this->command);
    }
}


