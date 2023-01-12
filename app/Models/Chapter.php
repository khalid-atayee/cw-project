<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
   public function session(){
    return $this->hasMany(Session::class);
   }

   public function mentor(){
    return $this->hasMany(Mentor::class);
   }

   public function organizer(){
    return $this->hasOne(Organizer::class);
   }
}