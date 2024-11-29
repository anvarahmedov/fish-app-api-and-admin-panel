<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\DeviceData;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       // dd('Seeder executed'); //
       // $faker = new Faker();
        return [
            'user_id' => User::find(rand(1, User::count()))->id,
            'device_name' => $this->faker->randomElement(['iPhone', 'Samsung', 'Pixel', 'OnePlus']) . ' ' . $this->faker->word(),
            'city' => $this->faker->city(),
            'region' => $this->faker->state(),
            'country' => $this->faker->country(),
            'latitude' => $this->faker->latitude( -90, 90 ),
            'longtitude' => $this->faker->longitude(-180, 180),
        //    'deviceDatas' => DeviceData::factory()
        ];
    }
}
