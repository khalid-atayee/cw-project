<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculamTemplate extends Model
{
    use HasFactory;
    public function CurriculamTemplateItem(){
        return $this->hasMany(CurriculamTemplateItem::class);
    }

    public function organizers(){
        return $this->belongsTo(Organizer::class,'organizer_id', 'id');
    }

    public function chapters(){
        return $this->hasManyThrough(Organizer::class,Chapter::class,'id', 'chapter_id','organizer_id' );
    }
}

