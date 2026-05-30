<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#Fillable(['type', 'stems', 'points'])
class Question extends Model
{
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class)->withPivot('order');
    
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
        
    }
}
