<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorType extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'type_en'];

    /**
     * Define a one-to-many relationship with Sensor.
     * One sensor type has many sensors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sensors()
    {
        return $this->hasMany(Sensor::class, 'type_id');
    }
}
