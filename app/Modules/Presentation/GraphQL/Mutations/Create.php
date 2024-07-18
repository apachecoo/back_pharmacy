<?php declare(strict_types=1);

namespace App\Modules\Presentation\GraphQL\Mutations;

use App\Modules\Presentation\BL\PresentationBL;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final readonly class Create
{
    public function __invoke(
        $rootValue,
        array $args,
        GraphQLContext $context
    ) {
        return (new PresentationBL())->create($args);
    }
}
