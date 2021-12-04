<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'brand_id', 'id');
        //param 2 punya product, param 3 punya brand
    }
}
