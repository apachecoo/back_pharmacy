<?php
declare(strict_types=1);

namespace App\Modules\Product\GraphQL\Mutations;

use App\Modules\Product\BL\ProductBL;

final readonly class Update
{
    function __invoke($rootValue, array $args)
    {
        return (new ProductBL())->update((int) $args['id'], $args['input']);
    }
}


