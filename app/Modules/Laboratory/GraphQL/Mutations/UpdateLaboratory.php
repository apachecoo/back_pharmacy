<?php
declare(strict_types=1);

namespace App\Modules\Customer\GraphQL\Mutations;
use App\Modules\Laboratory\BL\LaboratoryBL;

final readonly class UpdateCustomer
{
    function __invoke($rootValue, array $args)
    {
        return (new LaboratoryBL())->update($args['id'],$args);
    }
}


