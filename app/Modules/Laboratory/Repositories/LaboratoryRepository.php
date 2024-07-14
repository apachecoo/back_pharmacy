<?php
namespace App\Modules\Laboratory\Repositories;

use App\Models\Laboratory;
use App\Modules\Core\Repositories\BaseRepository;


class LaboratoryRepository extends BaseRepository
{
   public function __construct()
   {
      parent::__construct(new Laboratory());
   }
}
