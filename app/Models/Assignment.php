<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public function organizer(){
        return $this->belongsTo(Organizer::class);
    }

    public function session(){
        return $this->belongsTo(Session::class);

    }
    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }

}
