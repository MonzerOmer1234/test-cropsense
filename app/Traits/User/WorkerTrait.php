<?php


namespace App\Traits\User;

use App\Models\FarmGroup;
use App\Models\Task;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

trait WorkerTrait {

    public function workerFarmGroup(): BelongsTo
    {
        // the user is a worker and he belongs to the farm group controlled by [admin]
        return $this->belongsTo(FarmGroup::class,'farm_group_id');
    }

    // based on above informations ,
    //farm_group_id is needed to define which farming gruop the worker belongs to

    // FarmGroup to User with role admin is 1 to 1 relationship [ FarmGroup 1:1 User[admin] ]
    // FarmGroup to User with role worker is 1 to m relationship [ FarmGroup 1:m User[worker] ]



    /**
     * Get all of the tasks for the WorkerTrait
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }



    function dueTodayTasks() : Collection {

        // TODO
        // temp file ,, don't mind it
        return collect([1,2,3]);
    }
}
