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
}

