<?php
namespace App\Modules\Product\Repositories;

use App\Models\Product;
use App\Modules\Core\Repositories\BaseRepository;


class ProductRepository extends BaseRepository
{
   public function __construct()
   {
      parent::__construct(new Product());
   }
}
