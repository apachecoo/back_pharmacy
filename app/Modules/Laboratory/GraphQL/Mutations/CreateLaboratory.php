<?php declare(strict_types=1);

namespace App\Modules\Laboratory\GraphQL\Mutations;

use App\Modules\Laboratory\BL\LaboratoryBL;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final readonly class CreateLaboratory
{
    public function __invoke(
        $rootValue,
        array $args,
        GraphQLContext $context,
        ResolveInfo $resolveInfo
    ) {
        return (new LaboratoryBL())->create($args);
    }
}
