<?php
declare(strict_types=1);

namespace App\Modules\Type\GraphQL\Mutations;

use App\Modules\Type\BL\TypeBL;

final readonly class UpdateType
{
    function __invoke($rootValue, array $args)
    {
        return (new TypeBL())->update((int) $args['id'], $args['input']);
    }
}


