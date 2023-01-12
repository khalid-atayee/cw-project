<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculamTemplateItem extends Model
{
    use HasFactory;
    public function CurriculamTemplate(){
        return $this->belongsTo(CurriculamTemplate::class);
    }
}
