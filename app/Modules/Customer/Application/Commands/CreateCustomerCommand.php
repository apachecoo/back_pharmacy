<?php

namespace App\Modules\Customer\Application\Commands;

class CreateCustomerCommand
{
    public string $name;
    public string $phone;
    public string $address;

    public function __construct(string $name, string $phone, string $address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }
}
