<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\FarmGroup;
use App\Models\Sensor;
use App\Models\SensorType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSensors extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Farm Owner
        $owner =   User::create([
            'name' => 'Musab',
            'email' => 'o@1.com',
            'phone' => '123456789',
            'type' => 1,
            'password' => 123456
        ]);

        // Farm Worker
        $worker =   User::create([
            'name' => 'Musab w',
            'email' => 'w@1.com',
            'phone' => '123456789',
            'type' => 2,
            'password' => 123456
        ]);

        /**  */

        $group =  FarmGroup::create([
            'user_id' => 1,
        ]);

        $farm = Farm::create([
            'farm_group_id' => $group->id,
            'name' => 'name',
            'location' => 'location',
            'size' => 1,
            'crop_type' => 'crop_type',
            'description' => 'description',
        ]);

        // $sensor_type = SensorType::create([
        //     'type' => 'رطوبة',
        //     'type_en' => 'moisture'
        // ]);
        // $sensor = Sensor::create([
        //     'type' => $sensor_type->type,
        //     'type_id' => $sensor_type->id,
        //     'farm_id' => $farm->id,
        //     'serial_number' => 11,
        //     'lat' => 1,
        //     'lng' => 1,
        //     'is_active' => 1,
        // ]);
    }
}
