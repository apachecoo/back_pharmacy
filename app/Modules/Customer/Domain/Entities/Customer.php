<?php

namespace App\Modules\Customer\Domain\Entities;

class Customer
{
    private $id;
    private $name;

    private $phone;

    private $address;


    public function __construct($id, $name, $phone, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function setAddress(string $address)
    {
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
