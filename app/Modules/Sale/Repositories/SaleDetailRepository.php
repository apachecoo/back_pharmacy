<?php
namespace App\Modules\Sale\Repositories;

use App\Models\SaleDetail;
use App\Modules\Core\Repositories\BaseRepository;


class SaleDetailRepository extends BaseRepository
{
   public function __construct()
   {
      parent::__construct(new SaleDetail());
   }
}
