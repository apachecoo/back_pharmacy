<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TypesTableSeeder::class);
        $this->call(PresentationsTableSeeder::class);
        $this->call(LaboratoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        Customer::factory(20)->create();
    }
}
