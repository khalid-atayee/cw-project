<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','description','chapter_id','image','user_id'];
    protected $guarded =[];
    
    function chapters(){
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }



}
