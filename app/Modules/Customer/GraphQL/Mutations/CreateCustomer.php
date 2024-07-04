<?php declare(strict_types=1);

namespace App\Modules\Customer\GraphQL\Mutations;
use App\Modules\Customer\Application\Handlers\CreateCustomerHandler;
use App\Modules\Customer\Application\Commands\CreateCustomerCommand;

final readonly class CreateCustomer
{
    private CreateCustomerHandler $createCustomerHandler;
    public function __construct(CreateCustomerHandler $createCustomerHandler){
        $this->createCustomerHandler = $createCustomerHandler;
    }

    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $command = new CreateCustomerCommand($args['name'], $args['phone']);
        return $this->createCustomerHandler->handle($command);
    }
}
