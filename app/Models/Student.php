<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'last_name',
        'first_name',
        'date_naissance',
        'phone',
        'email',
        'avatar',
        'parentsName',
        'parentsMobileNumber',
        'gender',
        'classe_id',
        'school_id'
        
    ];
    public function classe(){
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }
    public function school(){
        return $this->belongsTo(School::class, 'school_id','id');
    }
    public function certif(){
        return $this->hasMany(Certif::class);
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teacher_student','student_id', 'teacher_id');
    }
    public function user(){

        return $this->belongsTo(User::class, 'user_id','id');

    }

    
    public function scores(){
        return $this->hasMany(Score::class);
    }
    public function storyReads(){
        return $this->hasMany(StoryRead::class);
    }

}
