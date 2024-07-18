<?php
namespace App\Modules\Presentation\Repositories;

use App\Models\Presentation;
use App\Modules\Core\Repositories\BaseRepository;


class PresentationRepository extends BaseRepository
{
   public function __construct()
   {
      parent::__construct(new Presentation());
   }
}
