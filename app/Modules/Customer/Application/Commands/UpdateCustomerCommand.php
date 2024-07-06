<?php

namespace App\Modules\Customer\Application\Commands;

class UpdateCustomerCommand
{
    public int $id;
    public string $name;
    public string $phone;
    public string $address;

}