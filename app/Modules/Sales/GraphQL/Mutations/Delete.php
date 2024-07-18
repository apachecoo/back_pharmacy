<?php
declare(strict_types=1);

namespace App\Modules\Sale\GraphQL\Mutations;

use App\Modules\Sale\BL\SaleBL;

final readonly class Delete
{

    protected SaleBL $SaleBL;
    public function __construct()
    {
        $this->SaleBL = new SaleBL();
    }
    function __invoke($rootValue, array $args): mixed
    {
        $id = (int) $args['id'] ?? null;
        if (!$this->SaleBL->getById($id)) {
            return $this->responseDelete(__('sale.deletedSale'), false);
        }
        if ($this->SaleBL->delete($id)) {
            return $this->responseDelete(__('sale.notFoundSale'), true);
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


