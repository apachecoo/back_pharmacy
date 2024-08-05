<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Laboratory;
use App\Models\Presentation;
use App\Models\Type;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $laboratoryIds = Laboratory::pluck('id')->toArray();
        $presentationIds = Presentation::pluck('id')->toArray();
        $typeIds = Type::pluck('id')->toArray();

        $productNames = [
            'Acetaminofén', 'Ibuprofeno', 'Loratadina', 'Amoxicilina', 'Paracetamol', 
            'Diclofenaco', 'Omeprazol', 'Ciprofloxacina', 'Metformina', 'Losartán', 
            'Enalapril', 'Simvastatina', 'Levotiroxina', 'Metronidazol', 'Captopril', 
            'Salbutamol', 'Clindamicina', 'Clorfeniramina', 'Prednisolona', 'Azitromicina', 
            'Ranitidina', 'Amlodipino', 'Fluconazol', 'Cefalexina', 'Albendazol', 
            'Ketoconazol', 'Betametasona', 'Hidroxicloroquina', 'Dexametasona', 'Glibenclamida', 
            'Hidralazina', 'Bromuro de ipratropio', 'Montelukast', 'Cetirizina', 'Carbamazepina', 
            'Furosemida', 'Tamsulosina', 'Nifedipino', 'Verapamilo', 'Valproato de sodio', 
            'Clopidogrel', 'Warfarina', 'Trimetoprim', 'Clotrimazol', 'Doxiciclina', 
            'Lamotrigina', 'Quetiapina', 'Gabapentina', 'Espironolactona', 'Isotretinoína'
        ];

        $products = [];

        for ($i = 0; $i < 50; $i++) {
            $products[] = [
                'laboratoryId' => $faker->randomElement($laboratoryIds),
                'presentationId' => $faker->randomElement($presentationIds),
                'typeId' => $faker->randomElement($typeIds),
                'code' => $faker->unique()->bothify('???-#####'),
                'product' => $faker->randomElement($productNames),
                'price' => $faker->randomFloat(2, 10, 1000),
                'stock' => $faker->numberBetween(0, 100),
                'expiration' => $faker->date('Y-m-d', '2025-12-31'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        Product::insert($products);
    }
}
