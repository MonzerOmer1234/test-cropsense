<?php

namespace App\Models;

use App\Models\Sensors\Humidity;
use App\Models\Sensors\Light;
use App\Models\Sensors\SoilMoisture;
use App\Models\Sensors\Tds;
use App\Models\Sensors\Temperature;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;

    // $table->foreignId('farm_group_id')->nullable()->constrained('farm_groups')->onDelete('cascade');

    // $table->string('name')->nullable();
    // $table->string('location')->nullable(); // text address
    // $table->double('size')->nullable(); // Area in hectares or acres
    // $table->string('crop_type')->nullable(); // Optional: Crops type
    // $table->text('description')->nullable(); // Optional: Detailed farm description
    // $table->json('polygon')->nullable();
    protected $fillable = [
        'farm_group_id',
        'name' ,
        'location',
        'size' ,
         'lat' ,
         'long',
        'crop_type',
        'description' ,
        'polygon'
    ];


    protected $casts = [
        'polygon' => 'array'
        ];

    /**
     * Define a one-to-many relationship with Sensor.
     * One farm has many sensors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sensors()
    {
        return $this->hasMany(Sensor::class);
    }

    /**
     * Define a many-to-one relationship with FarmGroup.
     * Many farms belong to One farm group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function farmGroup()
    {
        return $this->belongsTo(FarmGroup::class);
    }



    // sensors realtions

    /**
     * Get all of the tdsSensor for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tdsSensors(): HasMany
    {
        return $this->hasMany(Tds::class);
    }

    /**
     * Get all of the lightSensors for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lightSensors(): HasMany
    {
        return $this->hasMany(Light::class);
    }

    /**
     * Get all of the tempratureSensors for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temepratureSensors(): HasMany
    {
        return $this->hasMany(Temperature::class);
    }


    /**
     * Get all of the moistureSensors for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moistureSensors(): HasMany
    {
        return $this->hasMany(SoilMoisture::class);
    }

    /**
     * Get all of the humiditySensors for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function humiditySensors(): HasMany
    {
        return $this->hasMany(Humidity::class);
    }
}
