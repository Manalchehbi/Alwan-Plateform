<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workSheetCategory extends Model
{
    use HasFactory;

    public function parent(){
       return $this->hasOne(workSheetCategory::class, 'id','parent_id');
    } 
    
    public function children(){
       return $this->hasMany(workSheetCategory::class, 'parent_id','id');
    }

    public function workSheets(){
        return $this->hasMany(Work_papers::class, 'category_id','id');
    }
}
