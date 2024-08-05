<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laboratory;
use Carbon\Carbon;

class LaboratoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laboratories = [
            ['name' => 'Laboratorios Bayer S.A.', 'address' => 'Carrera 50 # 12-85, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios Roche S.A.', 'address' => 'Calle 94 # 11-30, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios Abbott S.A.', 'address' => 'Carrera 45 # 26-75, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios Pfizer S.A.', 'address' => 'Calle 82 # 10-33, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios Novartis S.A.', 'address' => 'Carrera 7 # 156-30, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios GlaxoSmithKline S.A.', 'address' => 'Calle 90 # 19-41, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios Sanofi S.A.', 'address' => 'Carrera 11 # 76-25, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios Merck S.A.', 'address' => 'Calle 93 # 16-45, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios Tecnoquímicas S.A.', 'address' => 'Carrera 23 # 76-15, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laboratorios Biogen S.A.', 'address' => 'Carrera 10 # 97A-13, Bogotá', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Laboratory::insert($laboratories);
    }
}
