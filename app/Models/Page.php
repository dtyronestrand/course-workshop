<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Page extends Model
{
    public function itemable(): MorphOne
    {
        return $this->morphOne(Itemable::class, 'itemable');
    }
}
