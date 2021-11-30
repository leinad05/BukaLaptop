<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
        //param 2 punya product (fk id supplier di tabel product), param 3 (id) punya supplier
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function transactions(){
        return $this->belongsToMany('App\Models\Transaction', 'product_transaction', 'product_id', 'transaction_id')->withPivot('quantity', 'harga');
    }

    public function specifications()
    {
        return $this->belongsToMany('App\Models\Specification', 'product_specification', 'product_id', 'specification_id')->withPivot('keterangan');
    }
}
