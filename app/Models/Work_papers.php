<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_papers extends Model
{
    protected $fillable = ['title','path'];
    

    public function thumbnails(){

        return $this->hasMany(worksheetThumbnail::class,'work_paper_id','id');
    }

    public function category(){
      
        return $this->belongsTo(workSheetCategory::class,'category_id', 'id');
    }
}
