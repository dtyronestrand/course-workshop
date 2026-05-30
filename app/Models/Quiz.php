<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

#Fillable(['title', 'instructions'])

class Quiz extends Model
{
    public function itemable(): MorphOne
    {
        return $this->morphOne(Itemable::class, 'itemable');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)
            ->withPivot('order')
            ->orderBy('pivot_order');
    }
}
