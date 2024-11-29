<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Device;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeviceData>
 */
class DeviceDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       // dd('Seeder executed'); //
      //  $faker = new Faker();
        return [
            'device_id' => Device::find(rand(1, Device::count()))->id,
            'light' => $this->faker->randomNumber(2, true),
            'oxygen' => $this->faker->randomNumber(2, true),
            'temperature' => $this->faker->randomNumber(2, true),

        ];
    }
}
