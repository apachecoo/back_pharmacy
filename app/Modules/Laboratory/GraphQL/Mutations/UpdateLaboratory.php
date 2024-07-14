<?php
declare(strict_types=1);

namespace App\Modules\Laboratory\GraphQL\Mutations;

use App\Modules\Laboratory\BL\LaboratoryBL;

final readonly class UpdateLaboratory
{
    function __invoke($rootValue, array $args)
    {
        return (new LaboratoryBL())->update((int) $args['id'], $args['input']);
    }
}


