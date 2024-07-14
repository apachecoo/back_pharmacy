<?php
declare(strict_types=1);

namespace App\Modules\Type\GraphQL\Mutations;

use App\Modules\Type\BL\TypeBL;

final readonly class DeleteType
{

    protected TypeBL $typeBL;
    public function __construct()
    {
        $this->typeBL = new TypeBL();
    }
    function __invoke($rootValue, array $args): mixed
    {
        $id = (int) $args['id'] ?? null;
        if (!$this->typeBL->getById($id)) {
            return $this->responseDelete(__('type.deletedType'), false);
        }
        if ($this->typeBL->delete($id)) {
            return $this->responseDelete(__('type.notFoundType'), true);
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


