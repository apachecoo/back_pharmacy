<?php

namespace App\Modules\Product\BL;

use App\Modules\Core\BL\BaseBL;
use App\Modules\Product\Repositories\ProductRepository;


class ProductBL extends BaseBL
{
    public function __construct()
    {
        $this->repository = new ProductRepository();
    }    
}
