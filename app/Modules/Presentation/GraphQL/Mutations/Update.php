<?php
declare(strict_types=1);

namespace App\Modules\Presentation\GraphQL\Mutations;

use App\Modules\Presentation\BL\PresentationBL;

final readonly class Update
{
    function __invoke($rootValue, array $args)
    {
        return (new PresentationBL())->update((int) $args['id'], $args['input']);
    }
}


