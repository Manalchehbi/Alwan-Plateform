<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'last_name',
        'first_name',
        'adresse',
        'email',
        'picture',
        'phone',
        'gender',
        'speciality_id',
        'school_id',
        
        
    ];
    public function speciality(){
        return $this->belongsTo(Speciality::class,'speciality_id', 'id');
    }
  
    public function school(){
        return $this->belongsTo(School::class);
    }
   
    public function certif(){
        return $this->belongsTo(Certif::class, 'certif_id','id');
    }
    public function students(){
        return $this->belongsToMany(Student::class,'teacher_student', 'teacher_id','student_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id','id');

    }

    public function classes(){
        return $this->belongsToMany(Classe::class, 'teacher_classe', 'teacher_id','classe_id');
    }
    public function homeworks(){
        return $this->hasMany(Homework::class);
    }
}
