<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class worksheetThumbnail extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'work_paper_id',
        'page_number',
        'path'

    ];

    public function worksheet(){
        return $this->belongsTo(Work_papers::class);
    }
}
