<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Carbon\Carbon;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['type' => 'Analgésico', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Antibiótico', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Antidepresivo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Antihistamínico', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Antiviral', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Vacuna', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Hormona', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Vitamina', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Suplemento Mineral', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Antifúngico', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Type::insert($types);
    }
}
