<?php

namespace App\Models\Sensors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Farm;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tds extends Model
{
    use HasFactory, HasApiTokens;
    protected $guarded = ['id'];

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
        return $this->hasMany(SensorRead::class,'tds_id');
    }
}
