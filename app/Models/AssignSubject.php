<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
   public function assignSub(){
    return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    
   }
}
