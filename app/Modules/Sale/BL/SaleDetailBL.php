<?php

namespace App\Modules\Sale\BL;

use App\Modules\Core\BL\BaseBL;
use App\Modules\Sale\Repositories\SaleDetailRepository;


class SaleDetailBL extends BaseBL
{
    public function __construct()
    {
        $this->repository = new SaleDetailRepository();
    }    
}
