<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicLevel extends Model
{
    protected $fillable = [
        'name'
    ];
public function stories(){
    return $this->hasMany(Stories::class);
}
public function classes(){
    return $this->hasMany(Classe::class,'academic_level_id', 'id');
}
}

