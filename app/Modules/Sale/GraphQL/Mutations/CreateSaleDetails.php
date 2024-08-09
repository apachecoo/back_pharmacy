<?php declare(strict_types=1);

namespace App\Modules\Sale\GraphQL\Mutations;

use App\Modules\Sale\BL\SaleDetailBL;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final readonly class CreateSaleDetails
{
    public function __invoke(
        $rootValue,
        array $args,
        GraphQLContext $context
    ) {
        return (new SaleDetailBL())->create($args);
    }
}
