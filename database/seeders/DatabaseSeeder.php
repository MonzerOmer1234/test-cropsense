<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\FarmGroup;
use App\Models\Sensor;
use App\Models\SensorRead;
use App\Models\SensorType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {



        $this->call([
            FarmSensors::class,
            SensorTypeSeeder::class,
            SensorSeeder::class,
            SensorReadSeeder::class,
        ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     // FarmSensors::class,
        // ]);

        // Seed the tables
         // Farm Owner
        //  $owner =   User::create([
        //     'name' => 'Musab',
        //     'email' => 'o@1.com',
        //     'phone' => '123456789',
        //     'type' => 1,
        //     'password' => 123456
        // ]);

        // // Farm Worker
        // $worker =   User::create([
        //     'name' => 'Musab w',
        //     'email' => 'w@1.com',
        //     'phone' => '123456789',
        //     'type' => 2,
        //     'password' => 123456
        // ]);

        // $group =  FarmGroup::create([
        //     'user_id' => 1,
        // ]);

        // $farm = Farm::create([
        //     'farm_group_id' => $group->id,
        //     'name' => 'name',
        //     'location' => 'location',
        //     'size' => 1,
        //     'crop_type' => 'crop_type',
        //     'description' => 'description',
        // ]);
        // $this->call([
        //     FarmSensors::class,
        //     SensorTypeSeeder::class,
        //     SensorSeeder::class,
        //     SensorReadSeeder::class,
        // ]);


          // Farm Owner
        //   $owner =   User::create([
        //     'name' => 'Musab',
        //     'email' => 'o@1.com',
        //     'phone' => '123456789',
        //     'type' => 1,
        //     'password' => 123456
        // ]);

        // // Farm Worker
        // $worker =   User::create([
        //     'name' => 'Musab w',
        //     'email' => 'w@1.com',
        //     'phone' => '123456789',
        //     'type' => 2,
        //     'password' => 123456
        // ]);

        // /**  */

        // $group =  FarmGroup::create([
        //     'user_id' => 1,
        // ]);

        // $farm = Farm::create([
        //     'farm_group_id' => $group->id,
        //     'name' => 'name',
        //     'location' => 'location',
        //     'size' => 1,
        //     'crop_type' => 'crop_type',
        //     'description' => 'description',
        // ]);

        // $sensor_type = SensorType::create([
        //     'type' => 'رطوبة',
        //     'type_en' => 'moisture'
        // ]);
        // $sensor = Sensor::create([
        //     'type' => $sensor_type->type,
        //     'type_en' => $sensor_type->type_en,
        //     'type_id' => $sensor_type->id,
        //     'farm_id' => $farm->id,
        //     'serial_number' => 11,
        //     'lat' => 1,
        //     'lng' => 1,
        //     'is_active' => 1,
        // ]);
        // $read = SensorRead::create([
        //     'read'=> 12,
        //     'sensor_id'=> 1,
        // ]);
    }
}
