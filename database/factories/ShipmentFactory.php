<?php

namespace Database\Factories;

use App\Models\Shipment;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition(): array
    {
        return [
            'address' => $this->faker->address(),
            'cost' => $this->faker->randomFloat(2, 5, 100),
            'shipping_method' => $this->faker->randomElement(['standard', 'express', 'overnight']),
            'status' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'cancelled']),
            'order_id' => Order::inRandomOrder()->first()?->id,
        ];
    }
}
