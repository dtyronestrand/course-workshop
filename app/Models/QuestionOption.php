<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#Fillable(['text', 'is_correct', 'question_id'])
class QuestionOption extends Model
{
   protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
