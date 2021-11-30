<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function products(){
        return $this->belongsToMany('App\Models\Product', 'product_transaction', 'transaction_id', 'product_id')
        ->withPivot('quantity', 'harga');
    }

    public function insertProduct($cart, $user){
        $total = 0;
        //dapat dari array atau key dari details
        foreach ($cart as $id_produk => $details) {
            $total += $details['price']*$details['quantity'];
            $this->products()->attach($id_produk, [
                'quantity'=>$details['quantity'],
                'harga_produk'=>$details['price'],
                'subtotal'=>$details['quantity']*$details['price']
            ]);
        }
        return $total;
    }
}
