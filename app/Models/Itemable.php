<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\Module;

class Itemable extends Model
{
    protected $fillable = [
        'module_id',
        'itemable_type',
        'itemable_id',
        'order',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
       
    }

    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }
}
