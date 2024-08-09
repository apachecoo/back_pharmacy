<?php

namespace App\Modules\Sale\BL;

use App\Modules\Core\BL\BaseBL;
use App\Modules\Sale\Repositories\SaleRepository;


class SaleBL extends BaseBL
{
    public function __construct()
    {
        $this->repository = new SaleRepository();
    }    
}
