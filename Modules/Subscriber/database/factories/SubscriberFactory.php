<?php

namespace Modules\Subscriber\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Subscriber\app\Models\Subscriber;

class SubscriberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Subscriber::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}

