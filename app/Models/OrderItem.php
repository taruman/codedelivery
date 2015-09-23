<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        "product_id",
        "order_id",
        "price",
        "qtd"
    ];  
    
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }    
    
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }     
          
}
