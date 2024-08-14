<?php

namespace App\Models\Sensors;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Humidity extends Model
{
    use HasFactory , HasApiTokens;


protected $guarded = ['id'];


    /**
     * Get the farm that owns the Humidity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }


    /**
     * Get all of the readings for the Humidity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function readings(): HasMany
    {
        return $this->hasMany(SensorRead::class,);
    }
}
