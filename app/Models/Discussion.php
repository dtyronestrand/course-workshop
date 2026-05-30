<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\MorphOne;

#[Fillable(['title', 'criteria', 'settings', 'purpose'])]
class Discussion extends Model
{
    public function itemable(): MorphOne
    {
        return $this->morphOne(Itemable::class, 'itemable');
    }
}
