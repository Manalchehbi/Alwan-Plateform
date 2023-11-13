<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'score_student',
        'score_teacher',
        'student_id',
        'exercise_id',
        'Repitition'  
    ];

    public function student(){
        return $this->BelongsTo(Student::class,'student_id','id');
    }
    public function exercise(){
        return $this->BelongsTo(Exercise::class,'exercise_id','id');
}
}
