<?php
declare(strict_types=1);

namespace App\Modules\Presentation\GraphQL\Mutations;

use App\Modules\Presentation\BL\PresentationBL;

final readonly class Delete
{

    protected PresentationBL $PresentationBL;
    public function __construct()
    {
        $this->PresentationBL = new PresentationBL();
    }
    function __invoke($rootValue, array $args): mixed
    {
        $id = (int) $args['id'] ?? null;
        if (!$this->PresentationBL->getById($id)) {
            return $this->responseDelete(__('Presentation.deletedPresentation'), false);
        }
        if ($this->PresentationBL->delete($id)) {
            return $this->responseDelete(__('Presentation.notFoundPresentation'), true);
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


