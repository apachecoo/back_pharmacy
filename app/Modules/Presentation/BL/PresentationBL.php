<?php

namespace App\Modules\Presentation\BL;

use App\Modules\Core\BL\BaseBL;
use App\Modules\Presentation\Repositories\PresentationRepository;


class PresentationBL extends BaseBL
{
    public function __construct()
    {
        $this->repository = new PresentationRepository();
    }    
}
