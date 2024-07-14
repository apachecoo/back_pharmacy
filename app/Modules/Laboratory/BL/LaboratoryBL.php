<?php

namespace App\Modules\Laboratory\BL;

use App\Modules\Core\BL\BaseBL;
use App\Modules\Laboratory\Repositories\LaboratoryRepository;


class LaboratoryBL extends BaseBL
{
    public function __construct()
    {
        $this->repository = new LaboratoryRepository();
    }    
}
