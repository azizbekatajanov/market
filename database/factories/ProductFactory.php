<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id'=>rand(1,30),
            'name'=>$this->faker->name(),
            'price'=>$this->faker->randomFloat($nbMaxDecimals =8, $min = 1, $max =9999),
            'old_price'=>$this->faker->randomFloat($nbMaxDecimals =8, $min = 1, $max =9999),
            'availability'=>rand(0,1),
            'amount'=>rand(1,9999),
            'category_id'=>rand(1,30),
        ];
    }
}
