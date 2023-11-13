<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_id' => function () {
                return factory(App\Models\Invoice::class)->create()->id;
            },
            'product_id' => function () {
                return factory(App\Models\Product::class)->create()->id;
            },
            'unit_price' => $faker->randomFloat(2, 10, 100),
            'quantity' => $faker->numberBetween(1, 10),
        ];
    }
}
