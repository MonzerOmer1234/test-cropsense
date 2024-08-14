<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $sensors = Sensor::all()->pluck('id'); // Fetch all sensor IDs

        // Generate 10 sensor reads
        // foreach (range(1, 30) as $index) {
        //     SensorRead::create([
        //         'read' => rand(0, 100),
        //         'sensor_id' => $sensors->random(), // Randomly pick an existing sensor ID
        //     ]);
        // }
    }
}
