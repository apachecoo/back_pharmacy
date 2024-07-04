<?php

namespace App\Clients\Application\Queries;

class GetClientByIdQuery
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}
