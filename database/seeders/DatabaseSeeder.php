<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Customer, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Customer::factory(20)->create();
        $this->call(TypesTableSeeder::class);
        $this->call(PresentationsTableSeeder::class);
        $this->call(LaboratoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
