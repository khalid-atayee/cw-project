<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $guarded = [];

   public function session(){
    return $this->hasMany(Session::class);
   }

   public function students(){
    return $this->hasMany(Student::class);
   }

   public function mentor(){
    return $this->hasMany(Mentor::class);
   }

   public function organizer(){
    return $this->hasOne(Organizer::class);
   }

   public function city(){
    return $this->belongsTo(City::class);
   }

   public function users(){
    return $this->belongsTo(User::class, 'user_id','id');
   }
}
