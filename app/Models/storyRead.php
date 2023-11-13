<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryRead extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'student_id',
        'nbre',
         
    ];

    public function story(){
        return $this->BelongsTo(Stories::class,'story_id','id');
    }
    public function student(){
        return $this->BelongsTo(Student::class,'student_id','id');
    }
}
