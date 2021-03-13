<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' =>  $this->faker->unique()->numberBetween(1, 100),
            'description' => $this->faker->paragraph,
            'amount' => $this->faker->numberBetween(50, 100), 
            'price' => $this->faker->randomDigit,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
