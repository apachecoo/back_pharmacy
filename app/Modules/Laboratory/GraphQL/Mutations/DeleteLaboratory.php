<?php
declare(strict_types=1);

namespace App\Modules\Laboratory\GraphQL\Mutations;

use App\Modules\Laboratory\BL\LaboratoryBL;

final readonly class DeleteLaboratory
{

    protected LaboratoryBL $laboratoryBL;
    public function __construct()
    {
        $this->laboratoryBL = new LaboratoryBL();
    }
    function __invoke($rootValue, array $args): mixed
    {
        $id = (int) $args['id'] ?? null;
        if (!$this->laboratoryBL->getById($id)) {
            return $this->responseDelete('No existe laboratorio.', false);
        }
        if ($this->laboratoryBL->delete($id)) {
            return $this->responseDelete('Laboratorio eliminado', true);
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


