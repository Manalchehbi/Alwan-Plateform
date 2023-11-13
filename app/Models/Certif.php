<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certif extends Model
{
    protected $fillable = [
        
        'date_obtention',
        'id_teacher',
        'id_student'
    ];
public function student(){
    return $this->belongsTo(Student::class);
}
public function teacher(){
    return $this->belongsTo(Teacher::class);
}
}
