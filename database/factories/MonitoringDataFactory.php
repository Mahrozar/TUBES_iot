<?php

namespace Database\Factories;

use App\Models\MonitoringData;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonitoringDataFactory extends Factory
{
    protected $model = MonitoringData::class;

    public function definition()
    {
        return [
            'device_id' => $this->faker->randomElement(['Device001', 'Device002', 'Device003']),
            'parameter' => $this->faker->randomElement(['Temperature', 'Humidity', 'Pressure']),
            'value' => $this->faker->randomFloat(2, 20, 100), // Nilai acak antara 20 dan 100
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
