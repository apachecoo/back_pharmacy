<?php

namespace App\Modules\Customer\Domain\Entities;

class Customer
{
    public $id;
    public $name;
    public $phone;
    public $address;


    public function __construct($id = null, $name, $phone, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
