<?php declare(strict_types=1);

namespace App\Modules\Sale\GraphQL\Mutations;

use App\Models\TempDetail;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final readonly class CreateTempDetails
{
    public function __invoke(
        $rootValue,
        array $args,
        GraphQLContext $context
    ) {
        return TempDetail::create($args);
    }
}
