<?php

namespace App\Models;

use App\Models\Sensors\SensorRead;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    // use HasFactory;
    protected $fillable = [
        'last_read',
        'farm_id',
        'type',
        'serial_number',
        'lat',
        'lng',
        'is_active',
        'type_id',
        'min_read',
        'max_read',
        'ideal_read',
        'notifiable',
        'readable',
    ];


    /**
     * Define a many-to-one relationship with SensorType.
     * many sensors belongs to one sensor type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sensorType()
    {
        return $this->belongsTo(SensorType::class, 'type_id');
    }

    /**
     * Define a one-to-many relationship with SensorRead.
     * one sensor has many readings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sensorReads()
    {
        return $this->hasMany(SensorRead::class);
    }

    function latestSensorRead() {
        return $this->hasMany(SensorRead::class)->latest();
    }

    /**
     * Define a many-to-one relationship with Farm.
     * many sensors belong to one farm.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
