<?php
declare(strict_types=1);

namespace App\Modules\Product\GraphQL\Mutations;

use App\Modules\Product\BL\ProductBL;

final readonly class Delete
{

    protected ProductBL $ProductBL;
    public function __construct()
    {
        $this->ProductBL = new ProductBL();
    }
    
    function __invoke($rootValue, array $args): mixed
    {
        $id = (int) $args['id'] ?? null;
        if (!$this->ProductBL->getById($id)) {
            return $this->responseDelete(__('product.deletedProduct'), false);
        }
        if ($this->ProductBL->delete($id)) {
            return $this->responseDelete(__('product.notFoundProduct'), true);
        }
        return $this->responseDelete('', false);
    }

    public function responseDelete(string $message, bool $deleted): array
    {
        return [
            'message' => $message,
            'deleted' => $deleted
        ];
    }
}


