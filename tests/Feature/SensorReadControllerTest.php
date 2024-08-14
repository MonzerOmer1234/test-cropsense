<?php

namespace Tests\Feature;

use App\Models\Sensor;
use App\Models\SensorRead;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SensorReadControllerTest extends TestCase
{
    // use RefreshDatabase;
    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * Test store sensor data with valid input.
     *
     * @return void
     */
    public function test_store_sensor_data_valid()
    {

        // Create a sensor for testing purpose
        // $sensor = Sensor::factory()->create();

        // Use seeded data
        $sensor = Sensor::find(1);

        // Optionally, you can assert that the sensor was created successfully
        $this->assertNotNull($sensor);
        $this->assertInstanceOf(Sensor::class, $sensor);
        
        // Valid payload with sensor_id and read
        $payload = [
            'sensor_id' => $sensor->id,
            'read' => 25.5,
        ];

        // Send POST request to store sensor data
        // Here a reading is created and not saved, Leading to -1 id in the
        //     database every time the command php artisan is run
        $response = $this->postJson('/api/sensor-read/store', $payload);

        // Assert response status is 201 Created
        $response->assertStatus(Response::HTTP_CREATED);

        // Assert response JSON structure
        $response->assertJsonStructure([
            'message',
            'data' => [
                'id',
                'sensor_id',
                'read',
                'created_at',
                'updated_at',
            ],
        ]);

        // Assert database has the sensor data record
        $this->assertDatabaseHas('sensor_reads', [
            'sensor_id' => $sensor->id,
            'read' => 25.5,
        ]);
    }

    /**
     * Test store sensor data with missing required fields.
     *
     * @return void
     */
    public function test_store_sensor_data_missing_fields()
    {
        // Missing sensor_id and read fields
        $payload = [];

        // Send POST request to store sensor data
        $response = $this->postJson('/api/sensor-read/store', $payload);

        // Assert response status is 422 Unprocessable Entity
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        // Assert response JSON structure for validation errors
        $response->assertJsonStructure([
            'error' => [
                'sensor_id',
                'read',
            ],
        ]);
    }

    /**
     * Test store sensor data with invalid sensor_id.
     *
     * @return void
     */
    public function test_store_sensor_data_invalid_sensor_id()
    {
        // Invalid sensor_id (non-existent ID)
        $payload = [
            'sensor_id' => 999, // Assuming 999 doesn't exist in sensors table
            'read' => 25.5,
        ];

        // Send POST request to store sensor data
        $response = $this->postJson('/api/sensor-read/store', $payload);

        // Assert response status is 422 Unprocessable Entity
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        // Assert response JSON structure for validation errors
        $response->assertJsonStructure([
            'error' => [
                'sensor_id',
            ],
        ]);
    }

    /**
     * Test retrieving sensor readings for a specific sensor ID.
     *
     * @return void
     */
    public function testGetSensorReadings()
    {
        // Create a sensor and associated readings for testing
        $sensorId = 1;
        // SensorReading::factory()->count(5)->create(['sensor_id' => $sensorId]);

        // Make GET request to retrieve sensor readings
        $response = $this->get("/api/sensor-read/{$sensorId}");

        // Assert HTTP status code 200 OK
        $response->assertStatus(200);

        // Assert JSON structure for the response
        $response->assertJsonStructure([
            '*' => ['id', 'sensor_id', 'read', 'created_at', 'updated_at'],
        ]);

    }
}
