<?php

namespace App\Modules\Customer\Application\Commands;

class CreateCustomerCommand
{
    public $name;
    public $phone;
    public $address;

    public function __construct($name, $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }
}
