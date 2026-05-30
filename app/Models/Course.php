<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Module;
use App\Models\CourseObjective;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['prefix', 'number', 'title', 'type', 'course_objectives_id', 'course_modules_id'])]
class Course extends Model
{
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
       
    }

    public function objectives(): HasMany
    {
        return $this->hasMany(CourseObjective::class);
       
    }
}
