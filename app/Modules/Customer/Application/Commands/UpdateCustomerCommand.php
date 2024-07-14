<?php

namespace App\Modules\Customer\Application\Commands;

class UpdateCustomerCommand
{
    public int $id;
    public string $name;
    public string $phone;
    public string $address;

    public function __construct(int $id =null, string $name, string $phone, string $address){
        $this->id = $id;
        $this->name = $name;    
        $this->phone = $phone;
        $this->address = $address;
    }
}