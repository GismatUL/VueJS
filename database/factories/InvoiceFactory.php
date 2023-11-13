<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subTotal = $faker->randomFloat(2, 100, 1000);
        $discount = $faker->randomFloat(2, 0, $subTotal);

        return [
            'number' => $faker->unique()->text(10),
            'customer_id' => function () {
                return factory(App\Models\Customer::class)->create()->id;
            },
            'date' => $faker->date,
            'due_date' => $faker->date,
            'reference' => $faker->text(20),
            'term_and_conditions' => $faker->paragraph,
            'sub_total' => $subTotal,
            'discount' => $discount,
            'total' => $subTotal - $discount,
        ];
    }
}
