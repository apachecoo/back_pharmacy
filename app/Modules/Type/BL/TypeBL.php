<?php

namespace App\Modules\Type\BL;

use App\Modules\Core\BL\BaseBL;
use App\Modules\Type\Repositories\TypeRepository;


class TypeBL extends BaseBL
{
    public function __construct()
    {
        $this->repository = new TypeRepository();
    }    
}
