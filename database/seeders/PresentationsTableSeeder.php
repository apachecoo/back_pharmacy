<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presentation;
use Carbon\Carbon;

class PresentationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $presentations = [
            ['name' => 'Tableta', 'shortName' => 'Tbl', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cápsula', 'shortName' => 'Cap', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Jarabe', 'shortName' => 'Jar', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Crema', 'shortName' => 'Cre', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Inyección', 'shortName' => 'Iny', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Supositorio', 'shortName' => 'Sup', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Polvo', 'shortName' => 'Pol', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gotas', 'shortName' => 'Got', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Spray', 'shortName' => 'Spr', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ungüento', 'shortName' => 'Ung', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Presentation::insert($presentations);
    }
}
