<?php
namespace App\Modules\Sale\Repositories;

use App\Models\Sale;
use App\Modules\Core\Repositories\BaseRepository;


class SaleRepository extends BaseRepository
{
   public function __construct()
   {
      parent::__construct(new Sale());
   }
}
