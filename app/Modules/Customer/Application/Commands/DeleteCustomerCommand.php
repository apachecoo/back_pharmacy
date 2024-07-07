<?php

namespace App\Modules\Customer\Application\Commands;

class DeleteCustomerCommand
{
    public int $id;

    public function __construct(int $id){
        $this->id = $id;
    }
}