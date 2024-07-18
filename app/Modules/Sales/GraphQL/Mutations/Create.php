<?php declare(strict_types=1);

namespace App\Modules\Sale\GraphQL\Mutations;

use App\Modules\Sale\BL\SaleBL;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final readonly class Create
{
    public function __invoke(
        $rootValue,
        array $args,
        GraphQLContext $context
    ) {
        return (new SaleBL())->create($args);
    }
}
