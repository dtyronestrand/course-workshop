<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\CourseObjetive;
use App\Models\Module;

#Fillable(['number', 'objective', 'module_id'])
class ModuleObjective extends Model
{
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
       
    }

    public function courseObjectives(): BelongsToMany
    {
        return $this->belongsToMany(CourseObjective::class);
       
    }
}
