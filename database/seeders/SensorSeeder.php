<?php

namespace Database\Seeders;

use App\Models\Sensors\Humidity;
use App\Models\Sensors\Light;
use App\Models\Sensors\SoilMoisture;
use App\Models\Sensors\Tds;
use App\Models\Sensors\Temperature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;



class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $sensorTypes = SensorType::all()->pluck('id'); // Fetch all sensor type IDs

        $sensorTypes = ['tds', 'light', 'moisture', 'humidity', 'temprature'];

        $data =  [
            'last_read' => now(),
            'farm_id' => 1, // Assuming you have 5 farms, adjust as needed
            // 'type' => array_rand($sensorTypes), // Example random string for 'type'
            'serial_number' => 'SN' . Str::random(),
            'lat' => rand(-90, 90),
            'lng' => rand(-180, 180),
            'is_active' => rand(0, 1),
            'farm_group_id'=> 1,
            // 'type_id' => $sensorTypes->random(), // Randomly pick an existing sensor type ID
            'min_read' => rand(0, 50),
            'max_read' => rand(51, 100),
            'ideal_read' => rand(25, 75),
            'notifiable' => true,
            'readable' => true,
        ];


        $data['type'] = 'tds';
        $data['type_en'] = 'tds';
        Tds::create($data);
        $data['type'] = 'light';
        $data['type_en'] = 'light';
        Light::create($data);

        $data['type'] = 'moisture';
        $data['type_en'] = 'moisture';
        SoilMoisture::create($data);

        $data['type'] = 'humidity';
        $data['type_en'] = 'humidity';
        Humidity::create($data);

        $data['type'] = 'temprature';
        $data['type_en'] = 'temprature';
        Temperature::create($data);

        logger('ok');


        // Generate 10 sensors
        // foreach (range(1, 15) as $index) {
        //     Sensor::create([
        //         'last_read' => now(),
        //         'farm_id' => rand(1, 5), // Assuming you have 5 farms, adjust as needed
        //         'type' => array_rand($sensorTypes), // Example random string for 'type'
        //         'serial_number' => 'SN' . $index,
        //         'lat' => rand(-90, 90),
        //         'lng' => rand(-180, 180),
        //         'is_active' => rand(0, 1),
        //         // 'type_id' => $sensorTypes->random(), // Randomly pick an existing sensor type ID
        //         'min_read' => rand(0, 50),
        //         'max_read' => rand(51, 100),
        //         'ideal_read' => rand(25, 75),
        //         'notifiable' => rand(0, 1),
        //         'readable' => rand(0, 1),
        //     ]);
        // }
    }
}
