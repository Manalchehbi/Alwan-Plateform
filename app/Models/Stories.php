<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stories extends Model
{
    protected $fillable = [
        'name',
        'description',
        'path',
        'picture',
        'difficulty_level_id'
        
    ];
    public function types(){
        return $this->belongsToMany(Type::class , 'story_type','story_id','type_id');
    }
    public function academic_levels(){
        return $this->belongsToMany(AcademicLevel::class , 'academic_level_story','story_id','academic_level_id');
    }
    public function difficulty_level(){
        return $this->belongsTo(DifficultyLevel::class, 'difficulty_level_id', 'id');
    }
    public function homework(){
        return $this->hasMany(Homework::class,'story_id', 'id');
    }
    public function exercises(){
        return $this->hasMany(Exercise::class,'story_id','id');
    }
    public function storyReads(){
        return $this->hasMany(StoryRead::class,'story_id','id');
    }
  
}
