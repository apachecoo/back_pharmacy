<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presentation>
 */
class PresentationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $presentations = ['Tableta', 'Jarabe', 'Crema', 'Inyección', 'Gel', 'Suspensión', 'Cápsula', 'Pomada', 'Spray'];
        $shortNames = ['Tab', 'Jrb', 'Crm', 'Inj', 'Gel', 'Ssp', 'Cap', 'Pom', 'Spr'];

        $index = $this->faker->numberBetween(0, count($presentations) - 1);

        return [
            'name' => $presentations[$index],
            'shortName' => $shortNames[$index],
        ];
    }
}
