<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','description','chapter_id','image','organizer_id','user_id'];

    function chapters(){
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }
    function organizers(){
        return $this->belongsTo(Organizer::class,'organizer_id','id');
    }
}
