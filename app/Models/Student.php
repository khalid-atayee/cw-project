<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function chapters(){
        return $this->belongsTo(Chapter::class, 'chapter_id','id');
    }
}
