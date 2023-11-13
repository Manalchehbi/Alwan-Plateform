<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        
        'name',
        'academic_level_id',
        'school_id',

        
    ];
    public function students(){
        return $this->hasMany(Student::class, 'classe_id','id');
    }
   
    public function homework(){
        return $this->hasMany(Homework::class, 'classe_id','id');
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'teacher_classe','teacher_id', 'classe_id');
    }
    public function academic_level(){
        return $this->belongsTo(AcademicLevel::class, 'academic_level_id', 'id');
    }
    public function  school(){
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
