<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use App\Models\ModuleObjective;

#Fillable(['number', 'title', 'course-id', 'order', 'items', ])
class Module extends Model
{
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
       
    }
    public function objectives(): HasMany
    {
        return $this->hasMany(ModuleObjective::class);
       
    }

    public function items(): HasMany
    {
        return $this->hasMany(Itemable::class)->orderBy('order');
       
    }
}
