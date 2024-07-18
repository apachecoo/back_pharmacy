<?php declare(strict_types=1);

namespace App\Modules\Product\GraphQL\Mutations;

use App\Modules\Product\BL\ProductBL;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final readonly class Create
{
    public function __invoke(
        $rootValue,
        array $args,
        GraphQLContext $context
    ) {
        return (new ProductBL())->create($args);
    }
}
