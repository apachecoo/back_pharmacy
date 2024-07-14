<?php declare(strict_types=1);

namespace App\Modules\Type\GraphQL\Mutations;

use App\Modules\Type\BL\TypeBL;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final readonly class CreateType
{
    public function __invoke(
        $rootValue,
        array $args,
        GraphQLContext $context,
        ResolveInfo $resolveInfo
    ) {
        return (new TypeBL())->create($args);
    }
}
