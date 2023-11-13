<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name',
        'path',
        'picture',
        'story_id',
        'exetype_id',
        
    ];
    
    public function story(){
        return $this->BelongsTo(Stories::class,'story_id','id');
    }
    public function exerciseType(){
        return $this->BelongsTo(ExerciseType::class,'exetype_id','id');
    }
    public function scores(){
         return $this->hasMany(Score::class);
    }

   
}