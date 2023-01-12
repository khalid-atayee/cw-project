<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public function chapter(){
        return $this->belongsTo(Chapter::class);

    }

    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }

    public function organizer(){
        return $this->belongsTo(Organizer::class);
    }
}
