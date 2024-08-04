<?php
declare(strict_types=1);

namespace App\Modules\Customer\GraphQL\Mutations;

use App\Modules\Customer\Application\Commands\UpdateCustomerCommand;
use App\Modules\Customer\Application\Handlers\UpdateCustomerHandler;

final readonly class UpdateCustomer
{
    private UpdateCustomerCommand $command;
    private UpdateCustomerHandler $handler;
    public function __construct()
    {
        $this->handler = app(UpdateCustomerHandler::class);
    }

    function __invoke($rootValue, array $args)
    {
        $this->command = new UpdateCustomerCommand(
            (int)$args['id'],
            $args['input']['name'],
            $args['input']['phone'],
            $args['input']['address'],
        );
        return $this->handler->handle($this->command);
    }
}


