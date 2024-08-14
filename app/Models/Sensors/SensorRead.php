<?php

namespace App\Models\Sensors;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SensorRead extends Model
{
    use HasFactory;
    protected $fillable = ['read', 'sensor_id'];


    /**
     * Define a many-to-one relationship with Sensor.
     * many sensor reads belong to one sensor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function temperatures()
    {
        return $this->belongsTo(Temperature::class);
    }
    public function humidities()
    {
        return $this->belongsTo(Humidity::class);
    }
    public function soilMoistures()
    {
        return $this->belongsTo(SoilMoisture::class);
    }
    public function lights()
    {
        return $this->belongsTo(Light::class);
    }
    public function tds()
    {
        return $this->belongsTo(Tds::class,'tds_id');
    }


    /**
     * Get the sensor that owns the SensorRead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sensor(): BelongsTo
    {
        return $this->belongsTo(Sensor::class);
    }
}
