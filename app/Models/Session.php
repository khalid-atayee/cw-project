<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','start_date','end_date','chapter_id',
    'mentor_id','curriculam_template_id','curriculam_template_item_id'];

    public function chapter(){
        return $this->belongsTo(Chapter::class);

    }

    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }
    public function organizer(){
        return $this->hasManyThrough(Chapter::class,Organizer::class,'chapter_id','id');
    }

}
