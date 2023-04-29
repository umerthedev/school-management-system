<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmountCategory extends Model
{
    use HasFactory;
    //relation with fee category model
    public function fee_category(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }//end relation with fee category model
    
}
