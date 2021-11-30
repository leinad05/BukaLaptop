<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public function products(){
        return $this->belongsToMany('App\Models\Product', 'product_specification', 'specification_id', 'product_id')->withPivot('keterangan');
    }
}
