<?php
namespace App\Modules\Type\Repositories;

use App\Models\Type;
use App\Modules\Core\Repositories\BaseRepository;


class TypeRepository extends BaseRepository
{
   public function __construct()
   {
      parent::__construct(new Type());
   }
}
