<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{   
    protected $table = 'homeworks';
    protected $fillable = [
        
        'name',
        'archive',
        'classe_id',
        'teacher_id',
        'story_id'
        
    ];
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function story(){
        return $this->belongsTo(Stories::class, 'story_id', 'id');
    }
  
}
