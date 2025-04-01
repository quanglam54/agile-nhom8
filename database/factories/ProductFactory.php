<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'category_id' => Category::factory(),
            'price' => $this->faker->randomFloat(2, 10, 10000),
            // sau phẩy 2 số và random 100-10000
            // $faker->numberBetween(100, 1000); // Số nguyên từ 100 đến 1000
            'stock' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->text(),
        ];
    }
}