<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'logo',
        'adresse',
        'phone',
        'email',
    
        

        
    ];
    public function student(){
        return $this->hasMany(Student::class,'school_id', 'id');
    }
    public function teacher(){
        return $this->hasMany(Teacher::class);
    }
    public function user(){

        return $this->belongsTo(User::class, 'user_id','id');

    }    
    public function classes(){
        return $this->hasMany(Classe::class,'school_id', 'id');
    }
}
