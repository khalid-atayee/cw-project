<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','url','chapter_id','student_id','session_id','mentor_id','grade_id'];

    public function organizer(){
        return $this->belongsTo(Organizer::class);
    }

    public function chapters(){
        return $this->belongsTo(Chapter::class,'chapter_id','id');

    }
    public function students(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function sessions(){
        return $this->belongsTo(Session::class,'session_id','id');
    }
    
    public function mentors(){
        return $this->belongsTo(Mentor::class,'mentor_id','id');
    }

    public function grades(){
        return $this->belongsTo(Grade::class,'grade_id','id');
    }

}
