<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\ModuleObjective;
use App\Models\Course;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['number', 'objective', 'course_id'])]

class CourseObjective extends Model
{
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
       
    }

    public function moduleObjectives(): BelongsToMany
    {
        return $this->belongsToMany(ModuleObjective::class);
       
    }
}
