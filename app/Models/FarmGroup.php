<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmGroup extends Model
{
    use HasFactory;


    /**
     * Define a one-to-many relationship with Farm.
     * One farm group has many farms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function farms() : HasMany
    {
        return $this->hasMany(Farm::class);
    }


    /**
     * Get all of the tasks for the FarmGroup
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

}
