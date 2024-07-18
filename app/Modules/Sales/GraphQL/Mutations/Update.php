<?php
declare(strict_types=1);

namespace App\Modules\Sale\GraphQL\Mutations;

use App\Modules\Sale\BL\SaleBL;

final readonly class Update
{
    function __invoke($rootValue, array $args)
    {
        return (new SaleBL())->update((int) $args['id'], $args['input']);
    }
}


